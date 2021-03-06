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
                    <a href="{{route('tambah_usulan.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped " id="example2">
                        <thead class="table-primary text-center">
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Perangkat Daerah</th>
                            <th>Tanggal Pengusulan</th>
                            <th>Nomor SPTJM</th>
                            <th>Penjelasan Komponen</th>
                            <th>Jenis Usulan</th>
                            <th>Perubahan</th>
                            <th>File Dukungan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tambah_usulan as $key => $usulan)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$usulan->user->username}}</td>
                                <td>{{$usulan->user->perangkat_daerah}}</td>
                                <td>{{$usulan->tanggal_usulan}}</td>
                                <td>{{$usulan->nomor_surat}}</td>
                                <td>{{$usulan->penjelasan_komponen}}</td>
                                <td>{{$usulan->jenis_usulan}}</td>
                                <td>created : {{$usulan->created_at}}
                                    <br>
                                    updated : {{$usulan->updated_at}}
                                    </td>
                                <td class = "text-center">
                                    <a class= "btn btn-success btn-xs" href="{{$usulan->file_excel_dukungan}}" download>
                                        Excel
                                    </a>
                                    <a class="btn btn-warning btn-xs" href="{{$usulan->file_rar_dukungan}}" download>
                                        Rar
                                    </a>
                                </td>
                                <td class = "text-center">
                                    <a href="{{route('tambah_usulan.edit', $usulan)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('tambah_usulan.destroy', $usulan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
