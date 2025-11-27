<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merk;

class DashboardController extends Controller
{
    public function index()
{
    $mobils = Mobil::all();
    $merks = Merk::all(); 
    return view('dashboard', compact('mobils', 'merks'));
}
}
