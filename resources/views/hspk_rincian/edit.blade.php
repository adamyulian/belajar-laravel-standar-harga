@extends('adminlte::page')
@section('title', 'Tambah Harga Satuan Pokok Kegiatan (HSPK)')
@section('content_header')
    <h1 class="m-0 text-dark">Rincian Harga Satuan Pokok Kegiatan (HSPK)</h1>
@stop
@section('content')
    <div class = "container-fluid">
        <div class= "row">
            <div class = "col-12">
                <div class = "callout callout-info">
                    <h5>
                        <i class ="fas fa-info">
                        </i>
                        Informasi :
                    </h5>
                    Halaman ini untuk menyusun rincian Harga Satuan Pokok Kegiatan (HSPK). Selalu ingat bahwa HSPK terdiri dari susunan Standar Harga Satuan yang telah ditetapkan oleh SK Walikota. Koefisien penyusunnya didapatkan berdasarkan aturan yang berlaku.
                </div>
                <div class = "invoice p-3 mb-3">
                    <div class = "row">
                        <div class = "col-12">
                            Detail HSPK
                        </div>
                    </div>
                    <div class = "row invoice-info">
                        <div class = "col-6">
                            <b>Nama HSPK</b>
                            : {{$hspks->nama_hspk}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('hspk.store')}}" method="post">
        @csrf

@stop
