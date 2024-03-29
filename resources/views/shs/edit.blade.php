@extends('adminlte::page')
@section('title', 'Edit SHS')
@section('content_header')
    <h1 class="m-0 text-dark">Ubah Data SHS</h1>
@stop
@section('content')
    <form action="{{route('shs.update', $standar_harga)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputkodeaset">Kode Aset</label>
                        <br>
                        <select class=" form-control @error('kode aset') is-invalid @enderror" aria-label="default select example" id="exampleInputKodeAset" name="kodefikasi_aset_id">
                                <option selected>{{$standar_harga->kodefikasi_aset->kode_aset}}|{{$standar_harga->kodefikasi_aset->nama_kelompok_aset}}</option>
                                @foreach ($kodefikasiaset as $item)
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
                        @error('kode aswt')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKode_komp">Kode Komponen</label>
                        <input type="text" class="form-control @error('kode_komp') is-invalid @enderror" id="exampleInputKode_komp"  name="kode_komp" value="{{$standar_harga->kode_komp ?? old('kode_komp')}}">
                        @error('kode_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnama_komp">Nama Komponen</label>
                        <input type="text" class="form-control @error('nama_komp') is-invalid @enderror" id="exampleInputnama_komp" placeholder="Nama Komponen..." name="nama_komp" value="{{$standar_harga->nama_komp ?? old('nama_komp')}}">
                        @error('nama_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputspesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputspesifikasi" placeholder="Spesifikasi Komponen..." name="spesifikasi" value="{{$standar_harga->spesifikasi ?? old('spesifikasi')}}">
                        @error('spesifikasi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="satuan_harga">Satuan Harga</label>
                        <br>
                        <select class=" form-control @error('Satuan Harga') is-invalid @enderror" aria-label="default select example" id="exampleInputSatuanHarga" name="satuan">
                                <option selected="">{{$standar_harga->satuan->satuan}}</option>
                                @foreach ($satuan as $item)
                                <option value="{{$item->id}}">{{$item->satuan}}</option>
                                @endforeach
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#exampleInputSatuanHarga').select2();
                            });
                        </script>
                        @error('Satuan Harga')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Satuan</label>
                        <input type="text" class="form-control
                        @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Harga Per Satuan..." name="harga_satuan" value="{{$standar_harga->harga_satuan ?? old('harga_satuan')}}">
                        @error('harga_satuan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pajak">Pajak PPn</label>
                        <select class="form-control @error('pajak') is-invalid @enderror" aria-label="default select example" id="exampleInputPajak" name="pajak_ppn">
                                <option selected>{{$standar_harga->pajak}}</option>
                                <option value="11%">11%</option>
                                <option value="0%">0%</option>
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#exampleInputPajak').select2();
                            });
                        </script>
                        @error('pajak')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputkodeRekeningBelanja">Rekening Belanja</label>
                        <br>
                        <select class=" form-control @error('Rekening Belanja') is-invalid @enderror" aria-label="default select example" id="exampleInputRekeningBelanja" name="kodefikasi_rekening_belanja">
                                <option selected="">{{$standar_harga->kodefikasi_rekening_belanja->kode_rekening_belanja}}|{{$standar_harga->kodefikasi_rekening_belanja->nama_rekening_belanja}}</option>
                                @foreach ($kodefikasi_rekening_belanja as $item)
                                <option value="{{$item->id}}">{{$item->kode_rekening_belanja}}|{{$item->nama_rekening_belanja}}</option>
                                @endforeach
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#exampleInputRekeningBelanja').select2();
                            });
                        </script>
                        @error('Kode Rekening Belanja')
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
