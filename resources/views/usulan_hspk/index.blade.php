@extends('adminlte::page')
@section('title', 'Daftar Usulan')
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Usulan Perangkat Daerah</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('usulan_hspk.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped " id="example2">
                        <thead class="table-warning text-center">
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Perangkat Daerah</th>
                            <th>Tanggal Pengusulan</th>
                            <th>Nomor SPTJM</th>
                            <th>Nama Komponen</th>
                            <th>Satuan</th>
                            <th>Nilai</th>
                            <th>File Dukungan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

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
