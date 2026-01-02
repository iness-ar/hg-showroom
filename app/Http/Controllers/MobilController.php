<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class MobilController extends Controller
{
    public function index(Request $request)
    {
        $query = Mobil::with('merk')->where('status', 'Ready')->orderBy('created_at', 'desc');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_mobil', 'like', '%' . $request->search . '%')
                    ->orWhere('warna', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        $mobils = $query->paginate(8);
        $mobils->appends($request->all());

        $merks = Merk::all();
        return view('mobil.dashboard', compact('mobils', 'merks'));
    }

    public function create() {}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mobil' => 'required|max:255',
            'tipe_mobil' => 'nullable|max:255',
            'no_polisi' => 'required|max:10',
            'warna' => 'required|max:50',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'harga_beli' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
            'status' => 'required|in:Ready,Sold Out',
            'foto_mobil' => 'required|image|max:2048',
            'id_merk' => 'required|exists:tb_merk,id',
        ]);

        try {
            $path = $request->file('foto_mobil')->store('mobil-photos', 'public');

            Mobil::create([
                'nama_mobil' => $validatedData['nama_mobil'],
                'tipe_mobil' => $validatedData['tipe_mobil'],
                'no_polisi' => 'required|max:10',
                'warna' => $validatedData['warna'],
                'tahun' => $validatedData['tahun'],
                'harga_jual' => $validatedData['harga_jual'],
                'harga_beli' => $validatedData['harga_beli'],
                'deskripsi' => $validatedData['deskripsi'],
                'status' => $validatedData['status'],
                'foto_mobil' => $path,
                'id_merk' => $validatedData['id_merk'],
                'tanggal_masuk' => now(),
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);
            return redirect()->route('mobil.dashboard')
            ->with('success', 'Data mobil baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal Tambah Mobil: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan data mobil. Silakan cek log server untuk detailnya (storage/logs/laravel.log).');
        }
    }

    public function show(string $id) {}

    public function edit(Mobil $mobil)
    {
        $merks = Merk::all();
        return view('edit', compact('mobil', 'merks'));
    }

    public function update(Request $request, Mobil $mobil)
    {
        $validatedData = $request->validate([
            'nama_mobil' => 'required|max:255',
            'tipe_mobil' => 'nullable|max:255',
            'no_polisi' => 'required|max:10',
            'warna' => 'required|max:50',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'harga_jual' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
            'status' => 'required|in:Ready,Sold Out',
            'foto_mobil_baru' => 'nullable|image|max:2048',
            'id_merk' => 'required|exists:tb_merk,id',
        ]);

        $updateData = $validatedData;

        if ($request->hasFile('foto_mobil_baru')) {
            if ($mobil->foto_mobil) {
                Storage::disk('public')->delete($mobil->foto_mobil);
            }

            $updateData['foto_mobil'] = $request->file('foto_mobil_baru')->store('mobil-photos', 'public');
        }

        unset($updateData['foto_mobil_baru']);

        $mobil->update($updateData);

        $updateData['updated_by'] = Auth::id();
        $mobil->update($updateData);


        return redirect()->route('mobil.dashboard')->with('success', 'Data mobil berhasil diperbarui!');
    }

    public function arsip()
    {

        $mobils = Mobil::where('status', 'Sold Out')->paginate(8);

        $mobilTerjual = Mobil::where('status', 'Sold Out')->count();

        return view('mobil.arsip', compact('mobils', 'mobilTerjual'));
    }


    public function search(Request $request)
    {
        $query = $request->get('query');

        $results = Mobil::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('model', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($results);
    }
}
