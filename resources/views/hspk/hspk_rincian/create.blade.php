@extends('adminlte::page')
@section('title', 'Tambah Harga Satuan Pokok Kegiatan (HSPK)')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Harga Satuan Pokok Kegiatan (HSPK)</h1>
@stop
@section('content')
    <div class = "row">
        <div class = "col-4">
            @foreach ($hspks as $key => $hspks)
            @endforeach
            <form action="{{route('hspk.hspk_rincian.store', $hspks)}}" method="post">
                @csrf
                <input name= "hspk_id" value="{{$hspks->id}}" hidden>
                <div class="form-group">
                    <label for="subkode_hspk">Sub Kode</label>
                    <input type="text" class="form-control @error('subkode_hspk') is-invalid @enderror" id="subkode_hspk"  placeholder="Sub Kode..."name="subkode_hspk" value="{{old('subkode_hspk')}}">
                    @error('subkode_hspk') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="standar_harga_id">Tambah Komponen</label>
                    <br>
                    <select class=" form-control @error('tambah_komponen') is-invalid @enderror" aria-label="default select example" id="standar_harga_id" name="standar_harga_id">
                            <option value="">Pilih Komponen</option>
                            @foreach ($standar_hargas as $item)
                            <option value="{{$item->id}}">{{$item->kode_komp}}|{{$item->nama_komp}}|@currency($item->harga_satuan)</option>
                            @endforeach
                    </select>
                    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                    <script>
                        $(document).ready(function() {
                        $('#standar_harga_id').select2();
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
                {{-- <input name= "subnilai_hspk" value="{{$hspk_rincian1->koefisien_hspk * $hspk_rincian1->standar_harga->harga_satuan}}" hidden> --}}
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
