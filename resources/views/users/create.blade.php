@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
    <form action="{{route('users.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap" id="exampleInputName" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" id="exampleInputUsername" name="username" value="{{old('username')}}">
                        @error('username') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPerangkatDaerah">Perangkat Daerah</label>
                        <input type="perangkat_daerah" class="form-control @error('perangkat_daerah') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Perangkat Daerah" name="email" value="{{old('email')}}">
                        @error('perangkat_daerah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="exampleInputPassword" name="password" value="{{old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputIs_Admin">Peran Akun</label>
                        <select class="form-control @error('is_admin') is-invalid @enderror" aria-label="default select example" id="exampleInputIs_Admin" name="is_admin">
                                <option selected>Pilih Peran Akun</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Surveyor">Surveyor</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="User">User</option>
                        </select>
                        @error('is_admin')
                        <span class="text-danger">{{$message}}</span> 
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop