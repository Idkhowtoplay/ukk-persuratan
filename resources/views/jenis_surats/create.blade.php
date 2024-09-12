@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis Surat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jenis_surats.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Surat</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Jenis</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $jenisSurat->kategori_id ?? '' == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>
        
        
      
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
