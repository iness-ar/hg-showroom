<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $page = $request->get('page', 'dashboard');

        $results = [];

        if ($page == 'dashboard') {
            $results = Mobil::where('status', 'tersedia')
                ->where(function($q) use ($query) {
                    $q->where('nama_mobil', 'like', "%$query%")
                      ->orWhere('tipe', 'like', "%$query%")
                      ->orWhere('tahun', 'like', "%$query%");
                })->get();
        } elseif ($page == 'arsip') {
            $results = Mobil::where('status', 'terjual')
                ->where(function($q) use ($query) {
                    $q->where('nama_mobil', 'like', "%$query%")
                      ->orWhere('tipe', 'like', "%$query%")
                      ->orWhere('tahun', 'like', "%$query%");
                })->get();
        } elseif ($page == 'riwayat') {
            $results = Transaksi::where(function($q) use ($query) {
                $q->where('nama_pembeli', 'like', "%$query%")
                  ->orWhere('nama_mobil', 'like', "%$query%")
                  ->orWhere('tanggal', 'like', "%$query%");
            })->get();
        }

        return response()->json($results);
    }
}
