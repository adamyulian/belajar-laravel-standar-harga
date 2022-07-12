@extends('adminlte::page')
@section('title', 'Edit SHS')
@section('content_header')
    <h1 class="m-0 text-dark">Edit SHS</h1>
@stop
@section('content')
    <form action="{{route('shs.update', $standar_harga)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
<<<<<<< HEAD
                        <label for="exampleInputName">Kode Aset</label>
                        <br>
                        <select class=" form-control @error('Kode Aset') is-invalid @enderror" aria-label="default select example" id="exampleInputKodeAset" name="KodeAset">
                                <option value="{{$standar_harga->kodefikasi_aset->kode_aset}}">{{$standar_harga->kodefikasi_aset->kode_aset}}</option>
                                @foreach ($kodefikasi_asets as $item)
                                <option value="{{$item->id}}">{{$item->kode_aset}}|{{$item->nama_kelompok_aset}}</option>
                                @endforeach
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#exampleInputKodeAset').select2();
                            });
                        </script>
                        @error('kode aset')
                        <span class="text-danger">{{$message}}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
=======
>>>>>>> parent of 196f2ef (Missing Parameters pada view edit, tabel sudah mulai tersambung)
                        <label for="exampleInputName">Kode Komponen</label>
                        <input type="text" class="form-control @error('kode_komp') is-invalid @enderror" id="exampleInputName" name="kode_komp" value="{{$standar_harga->kode_komp ?? old('kode_komp')}}">
                        @error('kode_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Komponen</label>
                        <input type="text" class="form-control @error('nama_komp') is-invalid @enderror" id="exampleInputName" name="nama_komp" value="{{$standar_harga->nama_komp ?? old('nama_komp')}}">
                        @error('nama_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Spesifikasi</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="spesifikasi" value="{{$standar_harga->spesifikasi ?? old('spesifikasi')}}">
                        @error('spesifikasi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Satuan</label>
                        <select class="form-control @error('satuan') is-invalid @enderror" aria-label="default select example" id="exampleInputName" name="satuan" value="{{$standar_harga->satuan}}">
                                <option selected>{{$standar_harga->satuan}}</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                        </select>
                        @error('satuan')
                        <span class="text-danger">{{$message}}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Satuan</label>
                        <input type="text" class="form-control 
                        @error('name') is-invalid @enderror" id="exampleInputName" name="harga_satuan" value="{{$standar_harga->harga_satuan}}">
                        @error('harga_satuan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Pajak</label>
                        <select class="form-control @error('pajak') is-invalid @enderror" aria-label="default select example" id="exampleInputPajak" name="pajak" value="{{$standar_harga->pajak}}">
                                <option selected>{{$standar_harga->pajak}}</option>
                                <option value="1">11%</option>
                                <option value="2">0%</option>
                        </select>
                        @error('pajak')
                        <span class="text-danger">{{$message}}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Rekening Belanja</label>
                        <select class="form-control @error('rek_belanja') is-invalid @enderror" aria-label="default select example" id="exampleInputRekBelanja" name="rek_belanja" value="{{$standar_harga->rek_belanja}}">
                                <option selected>{{$standar_harga->rek_belanja}}</option>
                                <option value="1">11%</option>
                                <option value="2">0%</option>
                        </select>
                        @error('rek_belanja')
                        <span class="text-danger">{{$message}}</span> 
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('shs.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop