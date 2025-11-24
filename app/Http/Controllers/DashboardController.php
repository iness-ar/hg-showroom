<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class DashboardController extends Controller
{
    public function index()
{
    $mobils = Mobil::all();
    return view('dashboard', compact('mobils'));
}
}
