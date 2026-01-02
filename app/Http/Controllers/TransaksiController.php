<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{

    // simpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:tb_mobil,id',
            'nama_pembeli' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tanggal_transaksi' => 'required|date',
            'tipe_transaksi' => 'required|in:Cash,Kredit',
            'total_pembelian' => 'required|numeric|min:0',
            'status_penjualan' => 'required|in:Pending,Selesai,Batal',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $mobil = Mobil::findOrFail($request->mobil_id);

        // Simpan file bukti
        $buktiPath = $request->hasFile('bukti')
            ? $request->file('bukti')->store('bukti_transaksi', 'public')
            : null;

        // Simpan transaksi
        Transaksi::create([
            'mobil_id' => $mobil->id,
            'nama_pembeli' => $request->nama_pembeli,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'tipe_transaksi' => $request->tipe_transaksi,
            'total_pembelian' => $request->total_pembelian,
            'status_penjualan' => $request->status_penjualan,
            'keterangan' => $request->keterangan,
            'bukti' => $buktiPath,
            'user_id' => auth()->id(),
            'user_id' => Auth::id(),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);


        // Update status mobil jadi Sold Out
        $mobil->update(['status' => 'Sold Out']);

        // Redirect ke dashboard agar card hilang, arsip otomatis terlihat
        return redirect()->route('mobil.dashboard')->with('success', 'Transaksi berhasil disimpan.');
    }

    // Riwayat transaksi
    public function riwayat()
    {
        $transaksis = Transaksi::with(['mobil', 'creator', 'updater'])
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

        $totalTransaksi = $transaksis->count();

        return view('transaksi.riwayat', compact('transaksis', 'totalTransaksi'));
    }
    // Method untuk tampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::with('mobil')->findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Method untuk update transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tanggal_transaksi' => 'required|date',
            'tipe_transaksi' => 'required|in:Cash,Kredit',
            'total_pembelian' => 'required|numeric|min:0',
            'status_penjualan' => 'required|in:Pending,Selesai,Batal',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Update data transaksi
        $transaksi->update([
            'nama_pembeli' => $request->nama_pembeli,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'tipe_transaksi' => $request->tipe_transaksi,
            'total_pembelian' => $request->total_pembelian,
            'status_penjualan' => $request->status_penjualan,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::id(),
        ]);

        // Jika ada file bukti baru, simpan dan hapus yang lama
        if ($request->hasFile('bukti')) {
            if ($transaksi->bukti) {
                Storage::disk('public')->delete($transaksi->bukti);
            }
            $transaksi->bukti = $request->file('bukti')->store('bukti_transaksi', 'public');
            $transaksi->save();
        }

        // Status mobil tetap Sold Out
        $transaksi->mobil->update(['status' => 'Sold Out']);

        return redirect()->route('transaksi.riwayat')->with('success', 'Transaksi berhasil diupdate.');
    }
    public function bayarCicilan(Request $request, $id)
    {
        $trx = Transaksi::findOrFail($id);
        $bayar = $request->input('bayar');

        $trx->sisa_cicilan -= $bayar;
        if ($trx->sisa_cicilan <= 0) {
            $trx->sisa_cicilan = 0;
            $trx->status_penjualan = 'Selesai';
        }
        $trx->save();

        return redirect()->back()->with('success', 'Pembayaran cicilan berhasil');
    }
    
    public function generatePDF($id)
    {
        $transaksi = Transaksi::with('mobil')->findOrFail($id);

        $pdf = Pdf::loadView('transaksi.struk_pdf', compact('transaksi'));

        $filename = 'struk_' . $transaksi->id . '.pdf';

        // Langsung download tanpa simpan di storage
        return $pdf->download($filename);
    }

    public function cetakStruk($id)
    {
        // Ambil data transaksi beserta mobil
        $transaksi = Transaksi::with('mobil')->findOrFail($id);

        // Tampilkan Blade struk
        return view('transaksi.struk', compact('transaksi'));
    }
}
