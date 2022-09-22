@extends('adminlte::page')
@section('title', 'Daftar Harga Satuan Pokok Kegiatan (HSPK)')
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Harga Satuan Pokok Kegiatan (HSPK)</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('hspk.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="table-light text-center">
                            <th>No.</th>
                            <th>Kode Aset</th>
                            <th>Kode Komponen</th>
                            <th>Nama HSPK</th>
                            <th>Penjelasan HSPK</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Pajak</th>
                            <th>Rekening Belanja</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        @foreach($hspk as $key => $hspks)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$hspks->kodefikasi_aset->kode_aset}}</td>
                                <td>{{$hspks->kode_komp}}</td>
                                <td>{{$hspks->nama_hspk}}</td>
                                <td>{{$hspks->penjelasan_hspk}}</td>
                                <td>{{$hspks->satuan->satuan}}</td>
                                <td>@currency($hspks->nilai_hspk)</td>
                                <td>{{$hspks->pajak}}</td>
                                <td>{{$hspks->kodefikasi_rekening_belanja->kode_rekening_belanja}}
                                    <br>
                                    {{$hspks->kodefikasi_rekening_belanja->nama_rekening_belanja}}</td>
                                <td>
                                    <a href="{{route('hspk.edit', $hspks)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('hspk.destroy', $hspks)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
