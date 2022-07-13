@extends('adminlte::page')
@section('title', 'Kodefikasi Rekening Belanja')
@section('content_header')
    <h1 class="m-0 text-dark">Kodefikasi Rekening Belanja</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('kodefikasi_rekening_belanja.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Kode Rekening Belanja</th>
                            <th>Nama Rekening Belanja</th>
                            <th>Penjelasan Rekening Belanja</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kodefikasi_rekening_belanja as $key => $rekening_belanja)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$rekening_belanja->kode_rekening_belanja}}</td>
                                <td>{{$rekening_belanja->nama_rekening_belanja}}</td>
                                <td>{{$rekening_belanja->penjelasan_rekening_belanja}}</td>
                                <td>
                                    
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