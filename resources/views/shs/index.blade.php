@extends('adminlte::page')
@section('title', 'Daftar Standar Harga')
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Standar Harga Satuan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('shs.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="table-info text-center">
                            <th>No.</th>
                            <th>Kode Aset</th>
                            <th>Kode Komponen</th>
                            <th>Nama Komponen</th>
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Pajak</th>
                            <th>Rekening Belanja</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        @foreach($shs as $key => $standar_hargas)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$standar_hargas->kodefikasi_aset_id}}</td>
                                <td>{{$standar_hargas->kode_komp}}</td>
                                <td>{{$standar_hargas->nama_komp}}</td>
                                <td>{{$standar_hargas->spesifikasi}}</td>
                                <td>{{$standar_hargas->satuan}}</td>
                                <td>{{$standar_hargas->harga_satuan}}</td>
                                <td>{{$standar_hargas->pajak}}</td>
                                <td>{{$standar_hargas->rek_belanja}}</td>
                                <td>
                                    <a href="{{route('shs.edit', $standar_hargas)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('shs.destroy', $standar_hargas)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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