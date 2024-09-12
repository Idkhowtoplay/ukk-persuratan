@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Surat</h1>

    <form action="{{ route('jenis_surats.update', $jenisSurat->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama_surat" class="form-label">Nama Surat</label>
            <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="{{ $jenisSurat->nama }}" required>
        </div>
        
        
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Jenis</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $jenisSurat->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
