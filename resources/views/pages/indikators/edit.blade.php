@extends('layouts.app')

@section('title', 'Edit KPI')

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
                <h1>Edit KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit KPI</h2>



                <div class="card">
                    <form action="{{ route('indikator.update', $indikator) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                    <?php
                                        foreach ($unitinduks as $unitinduk) {

                                        if ($unitinduk->id==$indikator->id_unit_induk) {
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

                                        if ($unitpelaksana->id==$indikator->id_pelaksana) {
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

                                        if ($unitlayanan->id==$indikator->id_layanan) {
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
                                <label>Aspirasi</label>
                                <input type="text"
                                    class="form-control @error('aspirasi')
                                is-invalid
                            @enderror"
                                    name="aspirasi" value="{{ $indikator->aspirasi }}">
                                @error('indikator_kinerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Indikator Kinerja</label>
                                <input type="text"
                                    class="form-control @error('indikator_kinerja')
                                is-invalid
                            @enderror"
                                    name="indikator_kinerja" value="{{ $indikator->indikator_kinerja }}">
                                @error('indikator_kinerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    <?php
                                        foreach ($kategoris as $kategori) {

                                        if ($kategori->id==$indikator->id_kategori) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $kategori->id;?>"><?php echo $kategori->nama_kategori; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Satuan KPI</label>
                                <select class="form-control" name="id_satuan">
                                    <?php
                                        foreach ($satuans as $satuan) {

                                        if ($satuan->id==$indikator->id_satuan) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $satuan->id;?>"><?php echo $satuan->nama_satuan; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="text"
                                    class="form-control @error('bobot')
                                is-invalid
                            @enderror"
                                    name="bobot" value="{{ $indikator->bobot }}">
                                @error('bobot')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Polaritas</label>
                                <input type="text"
                                    class="form-control @error('polaritas')
                                is-invalid
                            @enderror"
                                    name="polaritas" value="{{ $indikator->polaritas }}">
                                @error('polaritas')
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
