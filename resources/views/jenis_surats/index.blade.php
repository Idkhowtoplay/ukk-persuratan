@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jenis Surat</h1>
    <a href="{{ route('jenis_surats.create') }}" class="btn btn-primary mb-3">Tambah Jenis Surat</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Jenis Dokumen</th>
                <th>Ditambahkan Oleh</th>
                <th>Waktu Ditambahkan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisSurats as $key => $jenisSurat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $jenisSurat->nama }}</td>
                    <td>{{ $jenisSurat->kategori->kategori }}</td>

                    <td>{{ $jenisSurat->pengedit }}</td>
                    <td>{{ $jenisSurat->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('jenis_surats.edit', $jenisSurat->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                        <form action="{{ route('jenis_surats.destroy', $jenisSurat->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
