<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        return view('dashboard', [
            'penjualanHariIni' => Penjualan::whereDate('tanggal', $today)->sum('total'),
            'transaksiHariIni' => Penjualan::whereDate('tanggal', $today)->count(),
            'totalProduk' => Produk::count(),
            'stokMenipis' => Produk::whereColumn('stok', '<=', 'stok_minimum')->count(),
        ]);
    }
}
