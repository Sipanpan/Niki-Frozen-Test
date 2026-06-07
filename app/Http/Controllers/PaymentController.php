<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk DB Transaction

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized  = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds        = config('midtrans.is_3ds');
    }

    // Fungsi untuk menampilkan halaman checkout dan men-generate Snap Token (Dummy Test)
    public function checkout()
    {
        // 1. Buat data pesanan dummy (Di dunia nyata, data ini dari keranjang belanja)
        $orderId = 'TRX-' . time();
        $order = Order::create([
            'order_id' => $orderId,
            'gross_amount' => 150000,
            'customer_name' => 'Budi Santoso',
            'customer_email' => 'budi@example.com',
            'payment_status' => 'pending',
        ]);

        // 2. Siapkan parameter untuk dikirim ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_id,
                'gross_amount' => $order->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => $order->customer_email,
            ],
        ];

        // 3. Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // 4. Simpan token ke database (opsional, tapi disarankan)
        $order->snap_token = $snapToken;
        $order->save();

        // 5. Kirim data ke view
        return view('checkout', compact('order', 'snapToken'));
    }

    // FUNGSI BARU: Untuk memproses checkout dari halaman Kasir (AJAX/Fetch)
    public function checkoutKasir(Request $request)
    {
        // Pastikan request memiliki data items (keranjang)
        $request->validate([
            'items' => 'required|array',
        ]);

        $items = $request->items;
        $grossAmount = 0;
        $itemDetails = [];

        // 1. Hitung total belanjaan berdasarkan data keranjang
        foreach ($items as $item) {
            $grossAmount += ($item['harga'] * $item['jumlah']);

            // Format item_details untuk dikirim ke Midtrans
            $itemDetails[] = [
                'id'       => $item['id'],
                'price'    => $item['harga'],
                'quantity' => $item['jumlah'],
                'name'     => substr($item['nama'], 0, 50), // Batas karakter nama max 50
            ];
        }

        $orderId = 'POS-' . time() . '-' . rand(100, 999);

        DB::beginTransaction();
        try {
            // 2. Simpan order ke database
            $order = Order::create([
                'order_id'       => $orderId,
                'gross_amount'   => $grossAmount,
                'customer_name'  => 'Pelanggan Kasir', // Sesuaikan jika ada input nama
                'customer_email' => 'kasir@tokoanda.com', // Sesuaikan jika perlu
                'payment_status' => 'pending',
            ]);

            // 3. Konfigurasi payload Midtrans
            $params = [
                'transaction_details' => [
                    'order_id'     => $orderId,
                    'gross_amount' => $grossAmount,
                ],
                'item_details' => $itemDetails,
                'customer_details' => [
                    'first_name' => 'Pelanggan',
                    'last_name'  => 'Kasir',
                ],
                // Aktifkan ini jika ingin spesifik langsung memunculkan QRIS & E-Wallet
                'enabled_payments' => ['qris', 'gopay', 'shopeepay']
            ];

            // 4. Dapatkan Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->update(['snap_token' => $snapToken]);

            DB::commit();

            // 5. Kembalikan response JSON ke Javascript (kasir.blade.php)
            return response()->json([
                'status'     => 'success',
                'snap_token' => $snapToken,
                'order_id'   => $orderId
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Fungsi untuk menangani Webhook/Notifikasi dari Midtrans (SANGAT PENTING)
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        // Validasi Signature Key untuk mencegah request palsu
        if ($hashed == $request->signature_key) {
            $order = Order::query()->where('order_id', $request->order_id)->first();

            if ($order) {
                // Update status pesanan berdasarkan notifikasi Midtrans
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->update(['payment_status' => 'success']);
                } elseif ($request->transaction_status == 'pending') {
                    $order->update(['payment_status' => 'pending']);
                } else if ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                    $order->update(['payment_status' => 'failed']);
                }
            }
        }

        return response()->json(['message' => 'Callback received']);
    }
}
