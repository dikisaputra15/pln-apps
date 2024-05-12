@extends('layouts.app')

@section('title', 'Form Realisasi KPI')

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
                <h1>Realisasi KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Filter By</h2>



                <div class="card">
                    <form action="/viewrealisasi" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-4">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                        <option>-Pilih Unit Induk-</option>
                                    @foreach ($unitinduks as $unitinduk)
                                        <option value="{{$unitinduk->id}}">{{$unitinduk->nama_unit_induk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Nama Unit Pelaksana</label>
                                 <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <option>-Select Unit Pelaksana-</option>
                                 </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Nama Unit Layanan / Bagian</label>
                                 <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <option>-Select Unit Layanan-</option>
                                 </select>
                            </div>

                            <div class="form-group col-4">
                                <label>Bulan</label>
                                <select class="form-control" name="bulan">
                                    <option value="JAN">JAN</option>
                                    <option value="FEB">FEB</option>
                                    <option value="MAR">MAR</option>
                                    <option value="APR">APR</option>
                                    <option value="MEI">MEI</option>
                                    <option value="JUN">JUN</option>
                                    <option value="JUL">JUL</option>
                                    <option value="AGU">AGU</option>
                                    <option value="SEP">SEP</option>
                                    <option value="OKT">OKT</option>
                                    <option value="NOV">NOV</option>
                                    <option value="DES">DES</option>
                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label>Tahun</label>
                                <input type="text" class="form-control" name="tahun" required>
                            </div>

                            <div class="form-group col-4 mt-4">
                                <button class="btn btn-primary">Search</button>
                            </div>
                            </div>
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

            $('#unit_induk').change(function(){
                var id_unit_induk = $('#unit_induk').val();
                if(id_unit_induk != '')
                {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchlayanan')}}",
                        data : {unit_induk:id_unit_induk},

                        success: function(data)
                        {
                            $('#unit_pelaksana').html(data);
                        }
                    });
                }
                else
                {
                    $('#unit_pelaksana').html('<option value="">Select Unit Pelaksana</option>');
                }
            });

            $('#unit_pelaksana').change(function(){
                let id_unit_pelaksana = $('#unit_pelaksana').val();

                $.ajax({
                    type : 'POST',
                    url : "{{url('fetchpelaksana')}}",
                    data : {unit_pelaksana:id_unit_pelaksana},

                    success: function(data)
                    {
                        $('#unit_layanan').html(data);
                    }
                });
            });

    });
</script>

@endpush
