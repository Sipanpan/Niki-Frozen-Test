<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() { return view('pendataan.produk.kategori', ['kategoris' => Kategori::withCount('produks')->get()]); }
    public function store(Request $request) { $request->validate(['nama' => 'required|string|max:255']); Kategori::create($request->only('nama', 'deskripsi')); return back()->with('success', 'Kategori ditambahkan.'); }
    public function destroy(Kategori $kategori) { $kategori->delete(); return back()->with('success', 'Kategori dihapus.'); }
}
