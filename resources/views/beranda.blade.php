@extends('app')

@section('title', 'Dashboard Divisi I')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="mb-0">Admin</h2>
    <p class="text-muted">Divisi I Wilayah Sumatera</p>
  </div>
  <div>
    <strong>Athallah Anargya Mahardika</strong>
  </div>
</div>

<div class="row text-center mb-4">
  <div class="col-md-4 mb-3">
  <a href="{{ url('/anggota') }}" style="text-decoration: none;"> 
    <div class="card card-custom p-3">
      <p class="mb-1">Anggota</p>
      <h2>{{ $jumlahAnggota }}</h2> <!-- Ganti angka statis -->
    </div>
  </a>
</div>
  <div class="col-md-4 mb-3">
      <div class="card p-3 border">
        <p class="mb-1">Divisi I</p>
        <p class="mb-0">Wilayah Sumatera</p>
      </div>
    </a>
  </div>
  <div class="col-md-4 mb-3">
    <a href="{{ url('/divisi') }}" style="text-decoration: none;">
      <div class="card sub-divisi p-3">
         <p class="mb-1">Sub Divisi</p>
      <h2>{{ $jumlahSubDivisi }}</h2>
      </div>
    </a>
  </div>
</div>
    <h1 style="text-align: center; color:#15400E;">
        Divisi I <br>Wilayah Sumatera
    </h1>

<div class="p-4 rounded mb-3" style="background-color:#EDF4EA">
  <p>
    Lorem ipsum dolor sit amet consectetur. Velit adipiscing a bibendum nunc tortor senectus suspendisse rhoncus.
    Duis vel hendrerit elit duis nunc magna id et. Pharetra vitae duis ultricies ultricies in. Diam sagittis eget
    dignissim in. Id hendrerit id nunc morbi purus lorem quisque suspendisse habitant...
  </p>
</div>

<div class="text-center text-muted small">
  Copyright &copy; ADN 2025. All Rights Reserved
</div>
@endsection
