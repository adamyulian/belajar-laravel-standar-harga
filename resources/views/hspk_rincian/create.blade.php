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
                        INFORMASI :
                    </h5>
                    Halaman ini untuk menyusun rincian Harga Satuan Pokok Kegiatan (HSPK). Selalu ingat bahwa HSPK terdiri dari susunan Standar Harga Satuan yang telah ditetapkan oleh SK Walikota. Koefisien penyusunnya didapatkan berdasarkan aturan yang berlaku.
                </div>
                <div class = "invoice p-3 mb-3">
                    <div class = "row">
                        <div class = "col-12">
                            <h5>
                                <strong>
                                    DETAIL HSPK
                                </strong>
                            </h5>
                        </div>
                    </div>
                    <div class = "row invoice-info">
                        <div class = "col-4">
                            <b>Kode Kelompok Aset</b>
                            <br>
                            <b>Kode Komponen</b>
                            <br>
                            <b>Nama HSPK</b>
                            <br>
                            <b>Satuan</b>
                            <br>
                            <b>Penjelasan HSPK</b>
                            <br>
                            <b>Kode Rekening</b>
                            <br>
                            <b>Nama Rekening</b>
                            <br>
                            <b>PPN</b>
                        </div>
                        <div class = "col-6">

                            : {{auth()->hspk()->id}}
                            <br>
                            : {{$hspks->kodefikasi_aset->kode_aset}}
                            <br>
                            : {{$hspks->nama_hspk}}
                            <br>
                            : {{$hspks->satuan->satuan}}
                            <br>
                            : {{$hspks->penjelasan_hspk}}
                            <br>
                            : {{$hspks->kodefikasi_rekening_belanja->kode_rekening_belanja}}
                            <br>
                            : {{$hspks->kodefikasi_rekening_belanja->nama_rekening_belanja}}
                            <br>
                            : {{$hspks->pajak}}
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-4">
                            <form action="{{route('hspk_rincian.store')}}" method="post">
                                @csrf
                                <input name= "hspk_id" value="{{$hspks->id}}" hidden>
                                <div class="form-group">
                                    <label for="subkode_hspk">Sub Kode</label>
                                    <input type="text" class="form-control @error('subkode_hspk') is-invalid @enderror" id="subkode_hspk"  placeholder="Sub Kode..."name="subkode_hspk" value="{{old('subkode_hspk')}}">
                                    @error('subkode_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="standar_harga_id">Tambah Komponen</label>
                                    <br>
                                    <select class=" form-control @error('tambah_komponen') is-invalid @enderror" aria-label="default select example" id="standar_harga_id" name="standar_harga_id">
                                            <option value="">Pilih Komponen</option>
                                            @foreach ($standar_hargas as $item)
                                            <option value="{{$item->id}}">{{$item->kode_komp}}|{{$item->nama_komp}}|@currency($item->harga_satuan)</option>
                                            @endforeach
                                    </select>
                                    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                        $('#standar_harga_id').select2();
                                        });
                                    </script>
                                    @error('standar harga')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="koefisien_hspk">Koefisien</label>
                                    <input type="float" class="form-control @error('koefisien_hspk') is-invalid @enderror" id="koefisien_hspk"  placeholder="Nilai Koefisien..."name="koefisien_hspk" value="{{old('koefisien_hspk')}}">
                                    @error('koefisien_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                        </div>
                        {{-- <div class = "col-8 table-responsive">
                            <table class ="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Sub Kode</th>
                                        <th>Komponen SHS</th>
                                        <th>Koefisien</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Sub Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hspk_rincians as $key => $rincian)
                                        <tr class="text-center">
                                            <td>{{$rincian->subkode_hspk}}</td>
                                            <td>{{$rincian->koefisien_hspk}}</td>
                                            <td>{{$rincian->subnilai_hspk}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
