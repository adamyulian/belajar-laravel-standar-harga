@extends('adminlte::page')
@section('title', 'Tambah SHS')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah SHS</h1>
@stop
@section('content')
    <form action="{{route('shs.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputkodeaset">Kode Aset</label>
                        <br>
                        <select class=" form-control @error('kode aset') is-invalid @enderror" aria-label="default select example" id="exampleInputKodeAset" name="kodefikasi_aset_id">
                                <option value="">Pilih Kode Aset</option>
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
                        @error('Kode Aset')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKode_komp">Kode Komponen</label>
                        <input type="text" class="form-control @error('kode_komp') is-invalid @enderror" id="exampleInputKode_komp"  name="kode_komp" value="{{old('kode_komp')}}">
                        @error('kode_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnama_komp">Nama Komponen</label>
                        <input type="text" class="form-control @error('nama_komp') is-invalid @enderror" id="exampleInputnama_komp" placeholder="Nama Komponen..." name="nama_komp" value="{{old('name')}}">
                        @error('nama_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputspesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputspesifikasi" placeholder="Spesifikasi Komponen..." name="spesifikasi" value="{{old('spesifikasi')}}">
                        @error('spesifikasi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputkodeSatuanHarga">Satuan Harga</label>
                        <br>
                        <select class=" form-control @error('Rekening Belanja') is-invalid @enderror" aria-label="default select example" id="exampleInputSatuanHarga" name="satuan">
                                <option value="">Pilih Satuan Harga</option>
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
                        @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Harga Per Satuan..." name="harga_satuan" value="{{old('harga_satuan')}}">
                        @error('harga_satuan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Pajak PPn</label>
                        <select class="form-control @error('pajak') is-invalid @enderror" aria-label="default select example" id="exampleInputPajak" name="pajak">
                                <option selected>Pilih Besaran PPn</option>
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
                                <option value="">Pilih Rekening Belanja</option>
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
