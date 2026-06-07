<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() { return view('pendataan.produk.produk', ['produks' => Produk::with('kategori', 'satuan')->paginate(20)]); }
    public function create() { return view('pendataan.produk.tambah', ['kategoris' => Kategori::all(), 'satuans' => Satuan::all()]); }

    public function store(Request $request)
    {
        $data = $request->validate(['nama' => 'required|string|max:255', 'sku' => 'nullable|string|unique:produks', 'barcode' => 'nullable|string', 'kategori_id' => 'nullable|exists:kategoris,id', 'satuan_id' => 'nullable|exists:satuans,id', 'harga_beli' => 'numeric|min:0', 'harga_jual' => 'required|numeric|min:0', 'stok' => 'integer|min:0', 'stok_minimum' => 'integer|min:0', 'deskripsi' => 'nullable|string', 'gambar' => 'nullable|image|max:2048']);
        if ($request->hasFile('gambar')) $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        Produk::create($data);
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk) { return view('pendataan.produk.tambah', ['produk' => $produk, 'kategoris' => Kategori::all(), 'satuans' => Satuan::all()]); }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate(['nama' => 'required|string|max:255', 'sku' => 'nullable|string|unique:produks,sku,'.$produk->id, 'barcode' => 'nullable|string', 'kategori_id' => 'nullable|exists:kategoris,id', 'satuan_id' => 'nullable|exists:satuans,id', 'harga_beli' => 'numeric|min:0', 'harga_jual' => 'required|numeric|min:0', 'stok' => 'integer|min:0', 'stok_minimum' => 'integer|min:0', 'deskripsi' => 'nullable|string', 'gambar' => 'nullable|image|max:2048']);
        if ($request->hasFile('gambar')) $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        $produk->update($data);
        return redirect('/produk')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Produk $produk) { $produk->delete(); return redirect('/produk')->with('success', 'Produk berhasil dihapus.'); }
}
