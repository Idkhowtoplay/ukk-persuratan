<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surat;
use App\Models\Pekerjaan;
use App\Models\Penduduk;
use App\Models\JenisSurat;
use App\Models\Kategori;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count(); 
        $surats = Surat::count();
        $pekerjaan = Pekerjaan::count();
        $penduduk = Penduduk::count();
        $jenisSurat = JenisSurat::count();
        $kategori = Kategori::count();
        return view('home', compact('userCount', 'surats', 'pekerjaan', 'penduduk', 'jenisSurat', 'kategori'));
    }
}
