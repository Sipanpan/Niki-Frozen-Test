<?php
namespace App\Http\Controllers;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function labaRugi()
    {
        $totalPenjualan = Penjualan::whereMonth('tanggal', now()->month)->sum('total');
        $totalPengeluaran = Pengeluaran::whereMonth('tanggal', now()->month)->sum('jumlah');
        return view('laporan.laba_rugi.laba-rugi', [
            'totalPenjualan' => $totalPenjualan,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $totalPenjualan - $totalPengeluaran,
        ]);
    }

    public function pengeluaran() { return view('laporan.laba_rugi.pengeluaran', ['pengeluarans' => Pengeluaran::latest('tanggal')->paginate(20)]); }

    public function storePengeluaran(Request $request)
    {
        $data = $request->validate(['kategori' => 'required|string', 'jumlah' => 'required|numeric|min:0', 'tanggal' => 'required|date', 'deskripsi' => 'nullable|string']);
        Pengeluaran::create($data);
        return back()->with('success', 'Pengeluaran ditambahkan.');
    }

    public function laporan() { return view('laporan.laporan_toko.laporan'); }
    public function performaKaryawan() { return view('laporan.laporan_toko.performa-karyawan'); }
    public function stockOpname() { return view('laporan.laporan_toko.stock-opname'); }
    public function cek() { return view('laporan.laporan_toko.cek'); }
    public function tambah() { return view('laporan.laporan_toko.tambah'); }
}
