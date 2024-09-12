<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\JenisSurat;
use App\Models\Kategori;

class JenisSuratController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::all();
        return view('jenis_surats.index', compact('jenisSurats'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $jenisSurat = JenisSurat::find(1); // Assuming you want to pre-select the first jenisSurat
        return view('jenis_surats.create', compact('kategoris', 'jenisSurat'));
    }
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        
        
        'kategori_id' => 'required', // Ini sekarang berfungsi sebagai jenis
    ]);

    JenisSurat::create([
        'nama' => $request->nama,
        
        'pengedit' => Auth::user()->name,
        'kategori_id' => $request->kategori_id,
    ]);

    return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat berhasil ditambahkan');
}


public function edit($id)
{
    $jenisSurat = JenisSurat::findOrFail($id);
    $kategoris = Kategori::all(); // Ambil semua data kategoris
    
    return view('jenis_surats.edit', compact('jenisSurat', 'kategoris'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_surat' => 'required|string|max:255',
        'kategori_id' => 'required|integer',
    ]);

    $jenisSurat = JenisSurat::findOrFail($id);
    $jenisSurat->nama = $request->input('nama_surat');
    $jenisSurat->kategori_id = $request->input('kategori_id');
    
    if($jenisSurat->save()) {
        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat berhasil diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Gagal memperbarui Jenis Surat.');
    }
}


    public function destroy(JenisSurat $jenisSurat)
    {
        $jenisSurat->delete();
        return redirect()->route('jenis_surats.index')->with('success', 'Jenis Surat deleted successfully.');
    }
}
