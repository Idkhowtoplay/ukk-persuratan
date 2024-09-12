@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Surat</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('surat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jenis_surat_id">Permintaan Pembuatan Surat</label>
            <select name="jenis_surat_id" class="form-control" required>
                @foreach($jenisSurats as $jenisSurat)
                    <option value="{{ $jenisSurat->id }}">{{ $jenisSurat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rt_rw">RT</label>
            <input type="text" name="rt" id="rt" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rt_rw">RW</label>
            <input type="text" name="rw" id="rt" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_surat">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
