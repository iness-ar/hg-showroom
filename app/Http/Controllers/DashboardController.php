<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merk;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Mobil::with('merk')
            ->where('status', 'Ready'); 

        if ($request->search) {
            $query->where('nama_mobil', 'like', '%' . $request->search . '%');
        }

        $mobils = $query->latest()->paginate(8);
        $mobils->appends($request->all());

        $merks = Merk::all();

        $totalMobilTersedia = Mobil::where('status', 'Ready')->count();
        $mobilTerjual = Mobil::where('status', 'Sold Out')->count();
        $totalTransaksi = Transaksi::count();

        return view('mobil.dashboard', compact(
            'mobils', 
            'merks', 
            'totalMobilTersedia', 
            'mobilTerjual', 
            'totalTransaksi'
        ));
    }
}
