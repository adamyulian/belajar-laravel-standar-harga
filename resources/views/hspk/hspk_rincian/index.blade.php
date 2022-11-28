@extends('adminlte::page')
@section('title', 'Rincian HSPK')
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
                            <br>
                            <b>Nilai HSPK</b>
                        </div>
                        <div class = "col-6">

                            : {{$hspks->kode_komp}}
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
                            <br>
                            :
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                Tambahkan Komponen HSPK
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="{{route('hspk.hspk_rincian.store', $hspks)}}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Komponen HSPK</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                            <input name= "hspk_id" value="{{$hspks->id}}" hidden>
                                            <div class="form-group">
                                                <label for="subkode_hspk">Sub Kode</label>
                                                <input type="text" class="form-control @error('subkode_hspk') is-invalid @enderror" id="subkode_hspk"  placeholder="Sub Kode..."name="subkode_hspk" value="{{old('subkode_hspk')}}">
                                                @error('subkode_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="js-data-example-ajax">Tambah Komponen</label>
                                                <br>
                                                <select name="standar_harga_id" id="standar_harga_id" class="js-data-example-ajax">
                                                    <option value='0'>--Pilih SHS--</option>
                                                </select>
                                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                                <meta charset="utf-8">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                                <script>
                                                    // CSRF Token
                                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                                    $(document).ready(function(){
                                                      $( ".js-data-example-ajax" ).select2({width:'100%',
                                                         ajax: {
                                                           url: "/getShs",
                                                           type: "post",
                                                           dataType: 'json',
                                                           delay: 250,
                                                           data: function (params) {
                                                             return {
                                                                _token: CSRF_TOKEN,
                                                                search: params.term // search term
                                                             };
                                                           },
                                                           processResults: function (response) {
                                                             return {
                                                               results: response
                                                             };
                                                           },
                                                           cache: true
                                                         }

                                                      });

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
                                            <input name= "hspk_id" value="{{$hspks->id}}" hidden>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col-8 table-responsive">
                            <table class ="table table-stripped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sub Kode</th>
                                        <th>Komponen SHS</th>
                                        <th>Koefisien</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Sub Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach($hspk_rincians as $key => $rincian)
                                        <tr>
                                            <td class="text-center">{{$rincian->subkode_hspk}}</td>
                                            <td class="text-center">{{$rincian->standar_harga->nama_komp}}</td>
                                            <td class="text-center">{{$rincian->koefisien_hspk}}</td>
                                            <td class="text-center">{{$rincian->standar_harga->satuan->satuan}}</td>
                                            <td class="text-center">@currency($rincian->standar_harga->harga_satuan)</td>
                                            @php
                                                $subtotal1= ($rincian->koefisien_hspk)*($rincian->standar_harga->harga_satuan);
                                                $subtotal+=$subtotal1;
                                            @endphp
                                            <td class="text-right">@currency($subtotal1)</td>
                                            <td class="text-center">
                                                <a href="{{route('hspk_rincian.destroy', $rincian)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                    Delete
                                                </a>             <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#staticBackdrop{{$rincian->id}}">
                                                    Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop{{$rincian->id}}" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <form action="{{route('hspk_rincian.update', $rincian)}}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                    <div class="modal-dialog">
                                                    <div class="modal-content text-left">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Komponen HSPK</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="subkode_hspk" class="text-right">Sub Kode</label>
                                                                    <input type="text" class="form-control @error('subkode_hspk') is-invalid @enderror" id="subkode_hspk"  placeholder="Sub Kode..." name="subkode_hspk" value="{{$rincian->subkode_hspk ?? old('subkode_hspk')}}">
                                                                    @error('subkode_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="standar_harga_id">Tambah Komponen</label>
                                                                    <br>
                                                                    <select class="js-data-example-ajax form-control @error('tambah_komponen') is-invalid @enderror" aria-label="default select example" id="standar_harga_id" name="standar_harga_id">
                                                                            <option value= "{{$rincian->standar_harga->id}}" selected>{{$rincian->standar_harga->nama_komp}}</option>
                                                                            @foreach ($standar_hargas as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_komp}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                                                    <meta charset="utf-8">
                                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                                                    <script>
                                                                        // CSRF Token
                                                                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                                                        $(document).ready(function(){
                                                                        $( ".js-data-example-ajax" ).select2({width:'100%',
                                                                            ajax: {
                                                                            url: "/getShs",
                                                                            type: "post",
                                                                            dataType: 'json',
                                                                            delay: 250,
                                                                            data: function (params) {
                                                                                return {
                                                                                    _token: CSRF_TOKEN,
                                                                                    search: params.term // search term
                                                                                };
                                                                            },
                                                                            processResults: function (response) {
                                                                                return {
                                                                                results: response
                                                                                };
                                                                            },
                                                                            studentSelect.trigger({
                                                                                type: 'select2:select',
                                                                                params: {
                                                                                    data: data,
                                                                            cache: true
                                                                            }

                                                                        });

                                                                        });
                                                                    </script>
                                                                    @error('standar harga')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="koefisien_hspk">Koefisien</label>
                                                                    <input type="float" class="form-control @error('koefisien_hspk') is-invalid @enderror" id="koefisien_hspk"  placeholder="Nilai Koefisien..."name="koefisien_hspk" value="{{$rincian->koefisien_hspk ?? old('koefisien_hspk')}}">
                                                                    @error('koefisien_hspk') <span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                                <input name= "hspk_id" value="{{$hspks->id}}" hidden>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class=text-center>Total</th>
                                        <th class=text-right>@currency($subtotal)</th>
                                        <th></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
