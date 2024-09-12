@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Surat</h2>
    <form action="{{ route('surat.update', $surat) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="permintaan_pembuatan_surat">Permintaan Pembuatan Surat</label>
            <select name="jenis_surat_id" class="form-control" required>
                @foreach($jenisSurats as $jenisSurat)
                    <option value="{{ $jenisSurat->id }}">{{ $jenisSurat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $surat->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $surat->nik }}" required>
        </div>
        <div class="form-group">
            <label for="rt_rw">RT</label>
            <input type="text" name="rt" id="rt" class="form-control" value="{{ $surat->rt}}" required>
        </div>
        <div class="form-group">
            <label for="rt_rw">RW</label>
            <input type="text" name="rw" id="rw" class="form-control" value="{{ $surat->rw }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_surat">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('Y-m-d') }}" required>

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
