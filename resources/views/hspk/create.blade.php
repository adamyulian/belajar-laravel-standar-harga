@extends('adminlte::page')
@section('title', 'Tambah Harga Satuan Pokok Kegiatan (HSPK)')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Harga Satuan Pokok Kegiatan (HSPK)</h1>
@stop
@section('content')
    <form action="{{route('hspk.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_hspk">Nama HSPK</label>
                        <input type="text" class="form-control @error('nama_hspk') is-invalid @enderror" id="nama_hspk"  placeholder="Kode Komponen..."name="nama_hspk" value="{{old('nama_hspk')}}">
                        @error('nama_hspk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kodefikasi_aset_id">Kode Kelompok Barang</label>
                        <br>
                        <select class=" form-control @error('kode aset') is-invalid @enderror" aria-label="default select example" id="exampleInputKodeAset" name="kodefikasi_aset_id">
                                <option value="">Pilih Kode Kelompok Barang</option>
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
                        <label for="kode_komp">Kode Komponen HSPK</label>
                        <input type="text" class="form-control @error('kode_komp') is-invalid @enderror" id="kode_komp"  placeholder="Kode Komponen..."name="kode_komp" value="{{old('kode_komp')}}">
                        @error('kode_komp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="satuan_id">Satuan Harga</label>
                        <br>
                        <select class="form-control @error('Satuan Harga') is-invalid @enderror" aria-label="default select example" id="satuan_id" name="satuan_id">
                                <option value="">Pilih Satuan Harga</option>
                                @foreach ($satuan as $item)
                                <option value="{{$item->id}}">{{$item->satuan}}</option>
                                @endforeach
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#satuan_id').select2();
                            });
                        </script>
                        @error('Satuan Harga')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_hspk">Nilai HSPK</label>
                        <input type="text" class="form-control @error('nilai_hspk') is-invalid @enderror" id="nilai_hspk"  placeholder="Kode Komponen..."name="nilai_hspk" value="{{old('nilai_hspk')}}">
                        @error('nilai_hspk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pajak">Pajak PPn</label>
                        <select class="form-control @error('pajak') is-invalid @enderror" aria-label="default select example" id="pajak" name="pajak">
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
                        <label for="kodefikasi_rekening_belanja_id">Rekening Belanja</label>
                        <br>
                        <select class=" form-control @error('Rekening Belanja') is-invalid @enderror" aria-label="default select example" id="kodefikasi_rekening_belanja_id" name="kodefikasi_rekening_belanja_id">
                                <option value="">Pilih Rekening Belanja</option>
                                @foreach ($kodefikasi_rekening_belanja as $item)
                                <option value="{{$item->id}}">{{$item->kode_rekening_belanja}}|{{$item->nama_rekening_belanja}}</option>
                                @endforeach
                        </select>
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#kodefikasi_rekening_belanja_id').select2();
                            });
                        </script>
                        @error('Kode Rekening Belanja')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Penjelasan HSPK</label>
                        <input type="text" class="form-control @error('penjelasan_hspk') is-invalid @enderror" id="penjelasan_hspk" placeholder="Penjelasan HSPK..." name="penjelasan_hspk" value="{{old('penjelasan_hspk')}}">
                        @error('penjelasan_hspk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('hspk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
@stop
