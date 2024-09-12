<?php

namespace App\Http\Controllers;

use App\Models\Surat;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\JenisSurat;
use App\Models\Penduduk;
use App\Rules\ValidPenduduk;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::all();
        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        $jenisSurats = JenisSurat::all();
        return view('surat.create', compact('jenisSurats'));
    }

    public function store(Request $request)
{
    // Validasi form input (tidak perlu tanggal_surat)
    $request->validate([
        'nama' => ['required', new ValidPenduduk($request->nik, $request->rt, $request->rw)],
        'nik' => 'required',
        'rt'  => 'required',
        'rw'  => 'required',
        'jenis_surat_id' => 'required',
    ]);
    
    // Periksa apakah penduduk ditemukan berdasarkan NIK
    $penduduk = Penduduk::where('nik', $request->nik)->first();

    if (!$penduduk) {
        return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.');
    }

    // Secara otomatis mengatur tanggal_surat menjadi tanggal hari ini
    $data = $request->all();
    $data['tanggal_surat'] = now();  // Atur tanggal_surat otomatis ke tanggal saat ini

    // Buat surat dengan data yang sudah diatur
    Surat::create($data);

    return redirect()->route('surat.index')->with('success', 'Surat created successfully.');
}
public function createe()
    {
        $jenisSurats = JenisSurat::all();
        return view('depan', compact('jenisSurats'));
    }

    public function storee(Request $request)
{
    // Validasi form input (tidak perlu tanggal_surat)
    $request->validate([
        'nama' => ['required', new ValidPenduduk($request->nik, $request->rt, $request->rw)],
        'nik' => 'required',
        'rt'  => 'required',
        'rw'  => 'required',
        'jenis_surat_id' => 'required',
    ]);
    
    // Periksa apakah penduduk ditemukan berdasarkan NIK
    $penduduk = Penduduk::where('nik', $request->nik)->first();

    if (!$penduduk) {
        return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.');
    }

    // Secara otomatis mengatur tanggal_surat menjadi tanggal hari ini
    $data = $request->all();
    $data['tanggal_surat'] = now();  // Atur tanggal_surat otomatis ke tanggal saat ini

    // Buat surat dengan data yang sudah diatur
    Surat::create($data);

    return redirect()->back()->with('surat berhasil diajukan', 'Silahkan tunggu surat diterima');
}

    

    public function edit(Surat $surat)
    {
        $jenisSurats = JenisSurat::all();
        return view('surat.edit', compact('surat', 'jenisSurats'));
    }

    public function update(Request $request, Surat $surat)
    {
        \Log::info('Metode update dipanggil dengan data:', $request->all());
        $request->validate([
            'jenis_surat_id' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tanggal_surat' => 'required|date',
        ]);

        $surat->jenis_surat_id = $request->input('jenis_surat_id');
        $surat->nama = $request->input('nama');
        $surat->nik = $request->input('nik');
        $surat->rt = $request->input('rt');
        $surat->rw = $request->input('rw');
        $surat->tanggal_surat = $request->input('tanggal_surat');

        \Log::info('Validasi berhasil, mulai mengupdate data.');

        
        if($surat->save()){
            return redirect()->route('surat.index')->with('success', 'Surat updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Surat gagal diupdate.');
        }

       
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat deleted successfully.');
    }

    public function printPdf($id)
    {
        // Find the Surat model with its related JenisSurat model
        $surat = Surat::with('jenisSurat')->find($id); 
        $penduduk = Penduduk::where('nama', $surat->nama)
        ->where('nik', $surat->nik)
        ->where('rt', $surat->rt)
        ->where('rw', $surat->rw)
        ->first();

    // Check if Penduduk is found
    if (!$penduduk) {
        return redirect()->back()->with('error', 'Penduduk tidak ditemukan.');
    }
    
        // Check if Surat or JenisSurat is not found
        if (!$surat || !$surat->jenisSurat) {
            return redirect()->back()->with('error', 'Surat atau jenis surat tidak ditemukan.');
        }
    
        // Determine the type of surat and generate the PDF
        switch ($surat->jenisSurat->nama) {
            case 'Surat Keterangan Domisili':
                $pdf = PDF::loadView('surat.domisili', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Domisili.pdf'); // Display in browser
            case 'Surat Keterangan Kematian':
                $pdf = PDF::loadView('surat.kematian', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Kematian.pdf'); // Display in browser
            case 'Surat Keterangan Usaha':
                $pdf = PDF::loadView('surat.usaha', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Usaha.pdf'); // Display in browser
            case 'Surat Keterangan Kelakuan Baik':
                $pdf = PDF::loadView('surat.kelakuan_baik', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Kelakuan_Baik.pdf'); // Display in browser
            case 'Surat Keterangan Tidak Mampu':
                $pdf = PDF::loadView('surat.tidak_mampu', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Tidak_Mampu.pdf'); // Display in browser
            default:
                return redirect()->back()->with('error', 'Jenis surat tidak dikenal.');
        }
    }
    public function verify($id)
    {
        $surat = Surat::findOrFail($id);
        $status = request('status', 'disetujui');
    
        if ($surat->status == 'diajukan') {
            $surat->status = $status;
            $surat->save();
        }
    
        return redirect()->route('surat.index')->with('success', 'Status surat berhasil diperbarui menjadi ' . $status);
    }
    
    

    




}

