<?php
namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index() { return view('pendataan.pelanggan.pelanggan', ['pelanggans' => Pelanggan::paginate(20)]); }
    public function create() { return view('pendataan.pelanggan.tambah'); }
    public function store(Request $request) { $data = $request->validate(['nama' => 'required|string|max:255', 'telepon' => 'nullable|string', 'email' => 'nullable|email', 'alamat' => 'nullable|string']); Pelanggan::create($data); return redirect('/pelanggan')->with('success', 'Pelanggan ditambahkan.'); }
    public function edit(Pelanggan $pelanggan) { return view('pendataan.pelanggan.tambah', compact('pelanggan')); }
    public function update(Request $request, Pelanggan $pelanggan) { $data = $request->validate(['nama' => 'required|string|max:255', 'telepon' => 'nullable|string', 'email' => 'nullable|email', 'alamat' => 'nullable|string']); $pelanggan->update($data); return redirect('/pelanggan')->with('success', 'Pelanggan diupdate.'); }
    public function destroy(Pelanggan $pelanggan) { $pelanggan->delete(); return redirect('/pelanggan')->with('success', 'Pelanggan dihapus.'); }
}
