<?php
namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() { return view('pendataan.supplier.supplier', ['suppliers' => Supplier::paginate(20)]); }
    public function create() { return view('pendataan.supplier.tambah'); }
    public function store(Request $request) { $data = $request->validate(['nama' => 'required|string|max:255', 'perusahaan' => 'nullable|string', 'telepon' => 'nullable|string', 'email' => 'nullable|email', 'alamat' => 'nullable|string']); Supplier::create($data); return redirect('/supplier')->with('success', 'Supplier ditambahkan.'); }
    public function edit(Supplier $supplier) { return view('pendataan.supplier.tambah', compact('supplier')); }
    public function update(Request $request, Supplier $supplier) { $data = $request->validate(['nama' => 'required|string|max:255', 'perusahaan' => 'nullable|string', 'telepon' => 'nullable|string', 'email' => 'nullable|email', 'alamat' => 'nullable|string']); $supplier->update($data); return redirect('/supplier')->with('success', 'Supplier diupdate.'); }
    public function destroy(Supplier $supplier) { $supplier->delete(); return redirect('/supplier')->with('success', 'Supplier dihapus.'); }
}
