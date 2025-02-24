@extends('layouts.app')

@section('title', 'RKM')

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
                <h1>Input RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Input RKM</h2>



                <div class="card">
                    <form action="{{ route('rkm.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input RKM</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                        <option value="0">-Pilih Unit Induk-</option>
                                    @foreach ($unitinduks as $unitinduk)
                                        <option value="{{$unitinduk->id}}">{{$unitinduk->nama_unit_induk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit Pelaksana</label>
                                 <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <option value="0">-Select Unit Pelaksana-</option>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit Layanan / Bagian</label>
                                 <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <option value="0">-Select Unit Layanan-</option>
                                 </select>
                            </div>

                            <div class="form-group">
                                <label>Indikator Kinerja KPI</label>
                                <select class="form-control" name="id_indikator_kpi" id="id_indikator_kpi">
                                        <option>-Pilih Indikator KPI-</option>
                                    @foreach ($indikators as $indikator)
                                        <option value="{{$indikator->id}}">{{$indikator->indikator_kinerja}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Polaritas RKM</label>
                                <select class="form-control" name="polaritas_rkm">
                                    <option value="0">-Pilih Polaritas-</option>
                                    <option value="3">Positif</option>
                                    <option value="1">Negatif</option>
                                    <option value="Range">Range</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Indikator RKM</label>
                                <input type="text"
                                    class="form-control @error('indikator_rkm')
                                is-invalid
                            @enderror"
                                    name="indikator_rkm">
                                @error('indikator_rkm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Satuan RKM</label>
                                <select class="form-control" name="id_satuan_rkm">
                                        <option>-Pilih Satuan RKM-</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{$satuan->id}}">{{$satuan->nama_satuan}}</option>
                                    @endforeach
                                </select>
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

            $('#unit_induk').change(function(){
                let id_unit_induk = $('#unit_induk').val();

                 // Set default "Semua" di Unit Pelaksana dan Unit Layanan
                $('#unit_pelaksana').html('<option value="">Semua</option>');
                $('#unit_layanan').html('<option value="">Semua</option>');

                if(id_unit_induk != '')
                {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchlayanan')}}",
                        data : {unit_induk:id_unit_induk},

                        success: function(data)
                        {
                            $('#unit_pelaksana').append(data);
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr);
                        }
                    });
                }
            });

            $('#unit_pelaksana').change(function(){
                let id_unit_pelaksana = $('#unit_pelaksana').val();

                 // Set default "Semua" di Unit Layanan
                 $('#unit_layanan').html('<option value="">Semua</option>');

                 if (id_unit_pelaksana !== '') {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchpelaksana')}}",
                        data : {unit_pelaksana:id_unit_pelaksana},

                        success: function(data)
                        {
                            $('#unit_layanan').append(data);
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr);
                         }
                    });
                }
            });

    });
</script>

@endpush
