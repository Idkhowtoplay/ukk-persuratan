@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-primary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h3>{{ $userCount }}</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ route('nigai') }}" class="nav-link small-box-footer {{ Request::is('payung') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-primary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h3>{{ $surats }}</h3>
              <p>Jumlah Surat</p>
            </div>
            <div class="icon">
              <i class="nav-icon bi bi-envelope"></i>
            </div>
            <a href="{{ route('surat.index') }}" class="nav-link small-box-footer {{ Request::is('surat') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-primary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h3>{{ $jenisSurat }}</h3>
              <p>Jumlah Jenis Surat</p>
            </div>
            <div class="icon">
              <i class="bi bi-folder-fill"></i>
            </div>
            <a href="{{ route('jenis_surats.index') }}" class="nav-link small-box-footer {{ Request::is('jenis_surats') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-3 col-sm-5">
    <div class="small-box bg-primary custom-small" style="margin-top: 20px; margin-left: 20px;">
        <div class="inner">
          <h3>{{ $penduduk }}</h3>
          <p>Jumlah Penduduk</p>
        </div>
        <div class="icon">
          <i class="bi bi-person-workspace"></i>
        </div>
        <a href="{{ route('rakka') }}" class="nav-link small-box-footer {{ Request::is('penduduk') ? 'active' : '' }}">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-md-3 col-sm-5">
  <div class="small-box bg-primary custom-small" style="margin-top: 20px; margin-left: 20px;">
      <div class="inner">
        <h3>{{ $pekerjaan }}</h3>
        <p>Jumlah Pekerjaan</p>
      </div>
      <div class="icon">
        <i class="bi bi-coin"></i>
      </div>
      <a href="{{ route('reki') }}" class="nav-link small-box-footer {{ Request::is('pekerjaan') ? 'active' : '' }}">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
  </div>
</div>
<div class="col-md-3 col-sm-5">
  <div class="small-box bg-primary custom-small" style="margin-top: 20px; margin-left: 20px;">
      <div class="inner">
        <h3>{{ $kategori }}</h3>
        <p>Jumlah Kategori</p>
      </div>
      <div class="icon">
        <i class="bi bi-folder-fill"></i>
      </div>
      <a href="{{ route('kategoris.index') }}" class="nav-link small-box-footer {{ Request::is('kategori') ? 'active' : '' }}">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
  </div>
</div>
</div>
@endsection
