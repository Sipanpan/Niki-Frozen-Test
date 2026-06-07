<?php
namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\Hutang;
use App\Models\ReturPembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index() { return view('transaksi.pembelian.pembelian', ['pembelians' => Pembelian::with('supplier')->latest()->paginate(20)]); }
    public function create() { return view('transaksi.pembelian.tambah', ['suppliers' => Supplier::all()]); }
    public function store(Request $request) { $data = $request->validate(['supplier_id' => 'required|exists:suppliers,id', 'no_faktur' => 'required|string|unique:pembelians', 'tanggal' => 'required|date', 'status_bayar' => 'required', 'keterangan' => 'nullable|string']); $data['total'] = 0; Pembelian::create($data); return redirect('/pembelian')->with('success', 'Pembelian ditambahkan.'); }
    public function hutang() { return view('transaksi.pembelian.hutang', ['hutangs' => Hutang::with('pembelian.supplier')->where('status', '!=', 'lunas')->get()]); }
    public function returPembelian() { return view('transaksi.pembelian.retur-pembelian', ['returs' => ReturPembelian::with('pembelian')->latest()->get()]); }
}
