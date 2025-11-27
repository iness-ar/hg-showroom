<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::with('merk')->orderBy('created_at', 'desc')->get();
        $merks = Merk::all();
        return view('dashboard', compact('mobils', 'merks'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mobil' => 'required|max:255',
            'tipe_mobil' => 'nullable|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'stok' => 'required|integer|min:1',
            'harga_beli' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
            'status' => 'required|in:Ready,Sold Out,Pre Order',
            'foto_mobil' => 'required|image|max:2048',
            'id_merk' => 'required|exists:tb_merk,id',
        ]);

        
        $path = $request->file('foto_mobil')->store('mobil-photos', 'public');

        Mobil::create([
            'nama_mobil' => $validatedData['nama_mobil'],
            'tipe_mobil' => $validatedData['tipe_mobil'],
            'tahun' => $validatedData['tahun'],
            'stok' => $validatedData['stok'],
            'harga_jual' => $validatedData['harga_jual'],
            'harga_beli' => $validatedData['harga_beli'],
            'deskripsi' => $validatedData['deskripsi'],
            'status' => $validatedData['status'],
            'foto_mobil' => $path,
            'id_merk' => $validatedData['id_merk'],
            'tanggal_masuk' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Data mobil baru berhasil ditambahkan!');
    }

    public function show(string $id)
    {
    }

    public function edit(Mobil $mobil)
    {
        $merks = Merk::all();
        return view('edit_mobil', compact('mobil', 'merks'));
    }

    public function update(Request $request, Mobil $mobil)
    {
        $validatedData = $request->validate([
            'nama_mobil' => 'required|max:255',
            'tipe_mobil' => 'nullable|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'stok' => 'required|integer|min:1',
            'harga_jual' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
            'status' => 'required|in:Ready,Sold Out,Pre Order',
            'foto_mobil_baru' => 'nullable|image|max:2048',
            'id_merk' => 'required|exists:tb_merk,id',
        ]);

        $updateData = $validatedData;

        if ($request->hasFile('foto_mobil_baru')) {
            Storage::disk('public')->delete($mobil->foto_mobil);

            $updateData['foto_mobil'] = $request->file('foto_mobil_baru')
                                                ->store('mobil-photos', 'public');
        } else {
            unset($updateData['foto_mobil_baru']);
        }

        $mobil->update($updateData);
        return redirect()->route('dashboard')->with('success', 'Data mobil berhasil diperbarui!');
    }

    public function destroy(Mobil $mobil)
    {
        Storage::disk('public')->delete($mobil->foto_mobil);
        $mobil->delete();
        return back()->with('success', 'Data mobil berhasil dihapus!');
    }
}
