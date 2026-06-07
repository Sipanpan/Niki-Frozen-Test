<?php
namespace App\Http\Controllers;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Piutang;
use App\Models\ReturPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index() { return view('transaksi.penjualan.penjualan', ['penjualans' => Penjualan::with('pelanggan')->latest()->paginate(20)]); }
    public function kasir() { return view('transaksi.penjualan.kasir', ['produks' => Produk::where('is_active', true)->where('stok', '>', 0)->get(), 'kategoris' => Kategori::all()]); }
    public function create() { return view('transaksi.penjualan.tambah', ['pelanggans' => Pelanggan::all()]); }

    public function store(Request $request)
    {
        // TODO: Implement full POS transaction logic
        return redirect('/penjualan')->with('success', 'Penjualan berhasil.');
    }

    public function piutang() { return view('transaksi.penjualan.piutang', ['piutangs' => Piutang::with('penjualan.pelanggan')->where('status', '!=', 'lunas')->get()]); }
    public function retur() { return view('transaksi.penjualan.retur', ['returs' => ReturPenjualan::with('penjualan')->latest()->get()]); }
}
