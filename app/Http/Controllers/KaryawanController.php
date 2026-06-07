<?php
namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\Absensi;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index() { return view('pengelolaan.karyawan', ['karyawans' => Karyawan::all()]); }
    public function create() { return view('pengelolaan.tambah'); }
    public function store(Request $request) { $data = $request->validate(['nama' => 'required|string|max:255', 'jabatan' => 'nullable|string', 'telepon' => 'nullable|string', 'gaji' => 'numeric|min:0', 'tanggal_masuk' => 'nullable|date', 'alamat' => 'nullable|string']); Karyawan::create($data); return redirect('/karyawan')->with('success', 'Karyawan ditambahkan.'); }
    public function edit(Karyawan $karyawan) { return view('pengelolaan.tambah', compact('karyawan')); }
    public function update(Request $request, Karyawan $karyawan) { $data = $request->validate(['nama' => 'required|string|max:255', 'jabatan' => 'nullable|string', 'telepon' => 'nullable|string', 'gaji' => 'numeric|min:0', 'tanggal_masuk' => 'nullable|date', 'alamat' => 'nullable|string']); $karyawan->update($data); return redirect('/karyawan')->with('success', 'Karyawan diupdate.'); }
    public function destroy(Karyawan $karyawan) { $karyawan->delete(); return redirect('/karyawan')->with('success', 'Karyawan dihapus.'); }
    public function absensi() { return view('pengelolaan.absensi', ['absensis' => Absensi::with('karyawan')->latest('tanggal')->paginate(30)]); }
}
