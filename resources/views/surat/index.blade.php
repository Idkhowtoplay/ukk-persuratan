@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('surat.create') }}" class="btn btn-primary">Tambah Surat</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Permintaan Pembuatan Surat</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>RT/RW</th>
                <th>Status</th>
                <th>Tanggal Surat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats as $surat)
                <tr>
                    <td>{{ $surat->id }}</td>
                    <td>{{ $surat->jenisSurat->nama }}</td>
                    <td>{{ $surat->nama }}</td>
                    <td>{{ $surat->nik }}</td>
                    <td>{{ $surat->rt }} / {{ $surat->rw }}</td>
                    <td>
                        <span class="badge badge-{{ $surat->status == 'disetujui' ? 'success' : ($surat->status == 'ditolak' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($surat->status) }}
                        </span>
                    </td>
                    
                    <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') }}</td>
                    <td>
                       
                        <a href="{{ route('surat.edit', $surat) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                        <form action="{{ route('surat.destroy', $surat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                        <a href="{{ route('surat.printPdf', $surat->id) }}" class="btn btn-secondary"><i class="bi bi-printer"></i></a>
                        
                        @if($surat->status == 'diajukan')
                            <a href="{{ route('surat.verify', ['id' => $surat->id, 'status' => 'disetujui']) }}" class="btn btn-success btn-sm"><i class="bi bi-check"></i></a>
                            <a href="{{ route('surat.verify', ['id' => $surat->id, 'status' => 'ditolak']) }}" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a>
                        @endif
                    </td>                    
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>
@endsection
