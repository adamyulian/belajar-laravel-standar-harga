@extends('adminlte::page')
@section('title', 'Edit Usulan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Usulan</h1>
@stop
@section('content')
    <form action="{{route('tambah_usulan.update', $tambah_usulan)}}" method="post">
        @method('PUT')
        @csrf
        <div class="card card-responsive border-primary mb-3">
            <div class="card-header text-white fs-3 bg-primary mb-3">FORM EDIT USULAN SHS</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername">Username</label>
                                <input type="text" value="{{auth()->user()->username}}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPerangkatDaerah">Perangkat Daerah</label>
                                <input type="text" value="{{auth()->user()->perangkat_daerah}}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputJumlahKomponen">Jumlah Komponen (dalam 1 SPTJM)</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputJumlahKomponen" placeholder="Tuliskan Jumlah Komponen yang Diusulkan" name="jumlah_komponen" value="{{$tambah_usulan->jumlah_komponen}}">
                                @error('jumlah_komponen') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNomorSurat">Nomor Surat Pernyataan Tanggung Jawab Mutlak</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputNomorSurat" placeholder="Nomor Surat" name="nomor_surat" value="{{$tambah_usulan->nomor_surat}}">
                                @error('nomor_surat') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFileExcelDukungan">Upload File Excel</label>
                                <input type="file" class="form-control" id="exampleInputFileExcelDukungan" name="file_excel_dukungan" value="{{$tambah_usulan->file_excel_dukungan}}">
                                <span>
                                    <a href="{{$tambah_usulan->file_excel_dukungan}}" download>
                                    <img src="{{$tambah_usulan->file_excel_dukungan}}" alt="dukungan_excel">
                                    </img>
                                    </a> 
                                </span>
                                @error('file_excel_dukungan') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputTanggalUsulan">Tanggal Pengusulan</label>
                                <input type="date" class="form-control @error('tanggal_usulan') is-invalid @enderror" id="exampleTanggalUsulan" name="tanggal_usulan" value="{{$tambah_usulan->tanggal_usulan}}">
                                @error('tanggal_usulan') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputJenisUsulan">Jenis Usulan</label>
                                <select class="form-control @error('jenis_usulan') is-invalid @enderror" aria-label="default select example" id="exampleInputJenisUsulan" name="jenis_usulan">
                                        <option selected>{{$tambah_usulan->jenis_usulan}}</option>
                                        <option value="BARU">BARU</option>
                                        <option value="UPDATE">UPDATE HARGA</option>
                                </select>
                                @error('jenis_usulan')
                                <span class="text-danger">{{$message}}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputJumlahDukunganPenyedia">Jumlah Dukungan Informasi Harga</label>
                                <input type="text" class="form-control @error('jumlah_dukungan_penyedia') is-invalid @enderror" id="exampleInputJumlahDukunganPenyedia" placeholder="Tuliskan Jumlah Dukungan Informasi Harga" name="jumlah_dukungan_penyedia" value="{{$tambah_usulan->jumlah_dukungan_penyedia}}">
                                @error('jumlah_dukungan_penyedia') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                                <div class="form-group">
                                <label for="exampleInputPenjelasanKomponen">Penjelasan Komponen</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPenjelasanKomponen" placeholder="Penjelasan Peruntukan Komponen" name="penjelasan_komponen" value="{{$tambah_usulan->penjelasan_komponen}}">
                                @error('penjelasan_komponen') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFileRarDukungan">Upload File Rar</label>
                                <input type="file" class="form-control" id="exampleInputFileRarDukungan" name="file_rar_dukungan">
                                <span>
                                    <a href="{{$tambah_usulan->file_rar_dukungan}}" download>
                                    <img src="{{$tambah_usulan->file_rar_dukungan}}" alt="dukungan_rar">
                                    </img>
                                    </a> 
                                </span>
                                @error('file_rar_dukungan')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('tambah_usulan.index')}}" class="btn btn-default">
                            Batal
                        </a>
                        <span> 
                    </div> 
                </div>       
                </div>
            </div>
        </div>
        <div class="card-footer">
             <strong>Catatan Penting :</strong>
             <br>
             1. Proses Upload Usulan Komponen akan berjalan, apabila mengupload file compress Data Pendukung Usulan dan Surat Pernyataan Tanggung Jawab Mutlak (dengan ekstensi .rar atau .zip) dan file Data Usulan Komponen (dengan.xls seperti hasil download).
             <br>
             2. Jangan Lupa Untuk Mengupload Data Surat Pernyatan Tanggung Jawab Mutlak Bersama dengan Data Pendukung dengan ukuran maksimal file compress data usulan adalah tidak terhingga. Proses Upload Usulan Komponen tidak akan berjalan, apabila total data pada excel Usulan Komponen tidak sama dengan isian Jumlah Komponen dalam SPJM.
        </div>
@stop