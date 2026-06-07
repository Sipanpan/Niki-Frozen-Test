<?php
namespace App\Http\Controllers;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index() { return view('pendataan.produk.satuan', ['satuans' => Satuan::all()]); }
    public function store(Request $request) { $request->validate(['nama' => 'required|string|max:255']); Satuan::create($request->only('nama', 'singkatan')); return back()->with('success', 'Satuan ditambahkan.'); }
    public function destroy(Satuan $satuan) { $satuan->delete(); return back()->with('success', 'Satuan dihapus.'); }
}
