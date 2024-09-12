<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();

        if (request()->ajax()) {
            return datatables()->of($pekerjaan)
                ->addColumn('Aksi', function ($pekerjaan) {
                    $button = '<button class="edit btn btn-primary" data-id="' . $pekerjaan->id . '">Edit</button>';
                    $button .= ' <button class="hapus btn btn-danger" data-id="' . $pekerjaan->id . '">Hapus</button>';
                    return $button;
        })
            ->rawColumns(['Aksi'])
            ->make(true);
        }

        return view('pekerjaan', compact('pekerjaan'));
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
        $pekerjaan = new Pekerjaan();
        $pekerjaan->nama = $request->nama;
        $simpan = $pekerjaan->save();

        if ($simpan) {
            return response()->json(['success' => $pekerjaan, 'text'=>'Pekerjaan berhasil ditambahkan'], 200);
        } else {
            return response()->json(['success' => $pekerjaan, 'text'=>'Pekerjaan gagal ditambahkan']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return response()->json($pekerjaan);
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
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->nama = $request->nama;
        $simpan = $pekerjaan->save();

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
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return response()->json(['text' => 'Data berhasil dihapus'], 200);
    }
}
