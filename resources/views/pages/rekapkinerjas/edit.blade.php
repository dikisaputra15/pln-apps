@extends('layouts.app')

@section('title', 'Edit Rekap Kinerja')

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
                <h1>Edit Rekap Kinerja</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Rekap Kinerja</h2>



                <div class="card">
                <form action="{{ route('rekapkinerja.update', $rekapkinerja->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                    <?php
                                        foreach ($unitinduks as $unitinduk) {

                                        if ($unitinduk->id==$rekapkinerja->id_unit_induk) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitinduk->id;?>"><?php echo $unitinduk->nama_unit_induk; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Unit Pelaksana</label>
                                <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <?php
                                        foreach ($unitpelaksanas as $unitpelaksana) {

                                        if ($unitpelaksana->id==$rekapkinerja->id_pelaksana) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitpelaksana->id;?>"><?php echo $unitpelaksana->nama_unit_pelaksana; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Unit Layanan Bagian</label>
                                <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <?php
                                        foreach ($unitlayanans as $unitlayanan) {

                                        if ($unitlayanan->id==$rekapkinerja->id_layanan) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitlayanan->id;?>"><?php echo $unitlayanan->nama_unit_layanan_bagian; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Indikator</label>
                                <select class="form-control" name="id_indikator" id="unit_indikator">
                                    <?php
                                        foreach ($indikators as $indikator) {

                                        if ($indikator->id==$rekapkinerja->id_indikator) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $indikator->id;?>"><?php echo $indikator->indikator_kinerja; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun" value="{{$rekapkinerja->tahun}}" required>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="text"
                                    class="form-control @error('bulan')
                                is-invalid
                            @enderror"
                                    name="bulan" value="{{$rekapkinerja->bulan}}" required>
                                @error('bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Target</label>
                                <input type="number"
                                    class="form-control @error('target')
                                is-invalid
                            @enderror"
                                    name="target" value="{{$rekapkinerja->target}}" required>
                                @error('target')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Reaslisasi</label>
                                <input type="number"
                                    class="form-control @error('realisasi')
                                is-invalid
                            @enderror"
                                    name="realisasi" value="{{$rekapkinerja->realisasi}}" required>
                                @error('target')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Pencapaian</label>
                                <input type="number"
                                    class="form-control @error('pencapaian')
                                is-invalid
                            @enderror"
                                    name="pencapaian" value="{{$rekapkinerja->pencapaian}}" required>
                                @error('pencapaian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number"
                                    class="form-control @error('nilai')
                                is-invalid
                            @enderror"
                                    name="nilai" value="{{$rekapkinerja->nilai}}" required>
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text"
                                    class="form-control @error('status')
                                is-invalid
                            @enderror"
                                    name="status" value="{{$rekapkinerja->status}}" required>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Penjelasan</label>
                                <input type="text"
                                    class="form-control @error('penjelasan')
                                is-invalid
                            @enderror"
                                    name="penjelasan" value="{{$rekapkinerja->penjelasan}}" required>
                                @error('penjelasan')
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
