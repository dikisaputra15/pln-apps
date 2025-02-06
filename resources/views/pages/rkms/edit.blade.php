@extends('layouts.app')

@section('title', 'Edit RKM')

@push('style')
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
                <h1>Edit RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit RKM</h2>



                <div class="card">
                    <form action="{{ route('rkm.update', $rkm->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                    <?php
                                        foreach ($unitinduks as $unitinduk) {

                                        if ($unitinduk->id==$rkm->id_unit_induk) {
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

                                        if ($unitpelaksana->id==$rkm->id_pelaksana) {
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
                                <label>Nama Unit Layanan / Bagian</label>
                                <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <?php
                                        foreach ($unitlayanans as $unitlayanan) {

                                        if ($unitlayanan->id==$rkm->id_layanan) {
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
                                <label>Indikator Kinerja KPI</label>
                                <select class="form-control" name="id_indikator_kpi">
                                    <?php
                                        foreach ($indikators as $indikator) {

                                        if ($indikator->id==$rkm->indikator_kinerja_kpi) {
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
                                <label>Bobot RKM</label>
                                <input type="text"
                                    class="form-control @error('bobot_rkm')
                                is-invalid
                            @enderror"
                                    name="bobot_rkm" value="{{ $rkm->bobot_rkm }}">
                                @error('bobot_rkm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Polaritas RKM</label>
                                <select class="form-control" name="polaritas_rkm">
                                    <option value="0" {{ isset($rkm) && $rkm->polaritas_rkm == 0 ? 'selected' : '' }}>-Pilih Polaritas-</option>
                                    <option value="1" {{ isset($rkm) && $rkm->polaritas_rkm == 1 ? 'selected' : '' }}>Positif</option>
                                    <option value="2" {{ isset($rkm) && $rkm->polaritas_rkm == 2 ? 'selected' : '' }}>Negatif</option>
                                    <option value="3" {{ isset($rkm) && $rkm->polaritas_rkm == 3 ? 'selected' : '' }}>Range</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Indikator RKM</label>
                                <input type="text"
                                    class="form-control @error('indikator_rkm')
                                is-invalid
                            @enderror"
                                    name="indikator_rkm" value="{{ $rkm->indikator_rkm }}">
                                @error('indikator_rkm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Satuan RKM</label>
                                <select class="form-control" name="id_satuan_rkm">
                                    <?php
                                        foreach ($satuans as $satuan) {

                                        if ($satuan->id==$rkm->id_satuan_rkm) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $satuan->id;?>"><?php echo $satuan->nama_satuan; ?></option>

                                     <?php } ?>

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
