@extends('layouts.app')

@section('title', 'Unit Layanan Forms')

@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Unit Layanan / Bagian</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Unit Layanan / Bagian</h2>



                <div class="card">
                    <form action="{{ route('unitlayanan.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                        <option>-Pilih Unit Induk-</option>
                                    @foreach ($unitinduks as $unitinduk)
                                        <option value="{{$unitinduk->id}}">{{$unitinduk->nama_unit_induk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit Pelaksana</label>
                                 <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <option>-Pilih Unit Pelaksana-</option>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit Layanan / Bagian</label>
                                <input type="text"
                                    class="form-control @error('nama_unit_layanan_bagian')
                                is-invalid
                            @enderror"
                                    name="nama_unit_layanan_bagian">
                                @error('nama_unit_layanan_bagian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $(function () {
            $('#unit_induk').on('change', function(){
                let id_unit_induk = $('#unit_induk').val();

                $.ajax({
                    type : 'POST',
                    url : "{{url('fetchlayanan')}}",
                    data : {unit_induk:id_unit_induk},
                    cache : false,

                    success: function(msg){
                        $('#unit_pelaksana').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
         })

    });
</script>

@endpush
