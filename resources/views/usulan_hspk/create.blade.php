@extends('adminlte::page')
@section('title', 'Tambah Usulan HSPK')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Usulan Standar Harga</h1>
@stop
@section('content')
        <div class= "container-fluid">
            <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                        Detail Usulan HSPK
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('usulan_hspk.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body p-3 mb-3">
                                    <div class="form-group">
                                        <label for="perangkat_daerah">Perangkat Daerah</label>
                                        <input type="text" name="perangkat_daerah" value="{{auth()->user()->perangkat_daerah}}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">UserID</label>
                                        <input type="text" name= "username" value="{{auth()->user()->username}}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_hspk">Nama Harga Satuan Pokok Kegiatan (HSPK)</label>
                                        <input type="text" class="form-control @error('Nama HSPK') is-invalid @enderror" id="nama_hspk" placeholder="Nama HSPK" name="nama_hspk" value="{{old('nama_hspk')}}">
                                        @error('nama_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="satuanharga">Satuan Harga</label>
                                        <br>
                                        <select class=" form-control @error('Satuan Harga') is-invalid @enderror" id="satuanharga" name="satuanharga">
                                                <option selected="">Pilih Satuan HSPK</option>
                                                @foreach ($satuan as $item)
                                                <option value="{{$item->id}}">{{$item->satuan}}</option>
                                                @endforeach
                                        </select>
                                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                            $('#satuanharga').select2();
                                            });
                                        </script>
                                        @error('Satuan Harga')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Pengusulan</label>
                                        <input type="date" class="form-control @error('Tanggal Usulan') is-invalid @enderror" id="tanggal_usulan" name="tanggal_usulan">
                                        @error('tanggal_usulan') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="file_rar_hspk">Upload File Rar</label>
                                        <input type="file" class="form-control" id="file_rar_hspk"name="file_rar_hspk"
                                        @error('file_rar_dukungan') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
