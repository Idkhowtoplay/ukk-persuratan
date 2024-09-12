<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PayungController extends Controller
{
    public function index()
    {
        $users = User::all();
    
        if (request()->ajax()) {
            return datatables()->of($users)
                ->addColumn('Aksi', function ($user) { // gunakan $user, bukan $users
                    $button = '<button class="edit btn btn-primary" data-id="' . $user->id . '"><i class="bi bi-pen-fill"></i></button>';
                    $button .= ' <button class="hapus btn btn-danger" data-id="' . $user->id . '"><i class="bi bi-trash3-fill"></i></button>';
                    return $button;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
        }
    
        return view('payung', compact('users'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    // Upload gambar dan simpan path-nya
    if ($request->hasFile('profile')) {
        $file = $request->file('profile'); // Pastikan file diambil dari request
        $path = $file->store('profiles', 'public'); // Simpan gambar di folder public/profiles
        $user->profile = basename($path); // Simpan hanya nama file di database


    }

    $simpan = $user->save();

    if ($simpan){
        return response()->json(['data' => $user, 'text'=>'Data berhasil disimpan'], 200);
    } else {
        return response()->json(['data' => $user, 'text'=>'Data gagal disimpan']);
    }
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return response()->json(['text' => 'Data berhasil dihapus'], 200);
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
}


public function update(Request $request, $id)
{
    $request->validate([
        'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Upload gambar baru jika ada
    if ($request->hasFile('profile')) {
        $file = $request->file('profile'); // Pastikan file diambil dari request
        $path = $file->store('profiles', 'public'); // Simpan gambar di folder public/profiles
        $user->profile = basename($path); // Simpan hanya nama file di database


    }

    $simpan = $user->save();

    if ($simpan){
        return response()->json(['text' => 'Data berhasil diupdate'], 200);
    } else {
        return response()->json(['text' => 'Data gagal diupdate']);
    }
}



}
