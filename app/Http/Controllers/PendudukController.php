<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Pekerjaan;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $penduduk = Penduduk::with('pekerjaan')->get();

    if (request()->ajax()) {
        return datatables()->of($penduduk)
            ->addColumn('Aksi', function ($penduduk) {
                $button = '<button class="edit btn btn-primary" data-id="' . $penduduk->id . '">Edit</button>';
                $button .= ' <button class="hapus btn btn-danger" data-id="' . $penduduk->id . '">Hapus</button>';
                $button .= ' <button class="show btn btn-info" data-id="' . $penduduk->id . '">Show</button>';
                return $button;
            })
            ->addColumn('pekerjaan', function ($penduduk) {
                return $penduduk->pekerjaan->nama; // Mengambil nama pekerjaan
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    $pekerjaan = Pekerjaan::all(); // Mengambil semua pekerjaan untuk dropdown option
    return view('penduduk', compact('penduduk', 'pekerjaan'));
}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $penduduk = new Penduduk();
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->nik = $request->nik;
        $penduduk->no_kk = $request->no_kk;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->agama = $request->agama;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->alamat_spesifik = $request->alamat_spesifik;
        $penduduk->status_perkawinan = $request->status_perkawinan;
        $penduduk->status_pendidikan = $request->status_pendidikan;
        $simpan = $penduduk->save();

        if ($simpan) {
            return response()->json(['success' => $penduduk, 'text'=>'Penduduk berhasil ditambahkan'], 200);
        } else {
            return response()->json(['success' => $penduduk, 'text'=>'Penduduk gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $penduduk = Penduduk::find($id);

    if ($penduduk) {
        return response()->json([
            'nama' => $penduduk->nama,
            'jenis_kelamin' => $penduduk->jenis_kelamin == 1 ? 'Laki-Laki' : 'Perempuan',
            'nik' => $penduduk->nik,
            'no_kk' => $penduduk->no_kk,
            'tanggal_lahir' => $penduduk->tanggal_lahir,
            'tempat_lahir' => $penduduk->tempat_lahir,
            'agama' => $penduduk->agama,
            'rt' => $penduduk->rt,
            'rw' => $penduduk->rw,
            'alamat_spesifik' => $penduduk->alamat_spesifik,
            'status_perkawinan' => $penduduk->status_perkawinan,
            'status_pendidikan' => $penduduk->status_pendidikan,
            'pekerjaan_id' => $penduduk->pekerjaan ? $penduduk->pekerjaan->nama : 'N/A'
        ]);
    }

    return response()->json(['error' => 'Data tidak ditemukan'], 404);
}

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return response()->json($penduduk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->nik = $request->nik;
        $penduduk->no_kk = $request->no_kk;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->agama = $request->agama;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->alamat_spesifik = $request->alamat_spesifik;
        $penduduk->status_perkawinan = $request->status_perkawinan;
        $penduduk->status_pendidikan = $request->status_pendidikan;
        $simpan = $penduduk->save();

        if ($simpan){
            return response()->json(['text' => 'Data berhasil diupdate'], 200);
        } else {
            return response()->json(['text' => 'Data gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();
        return response()->json(['text' => 'Data berhasil dihapus'], 200);
    }
}
