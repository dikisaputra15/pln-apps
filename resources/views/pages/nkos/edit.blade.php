@extends('layouts.app')

@section('title', 'Edit Nko')

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
                <h1>Edit NKO</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit NKO</h2>



                <div class="card">
                <form action="{{ route('nko.update', $nko) }}" method="POST">
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

                                        if ($unitinduk->id==$nko->id_unit_induk) {
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

                                        if ($unitpelaksana->id==$nko->id_pelaksana) {
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

                                        if ($unitlayanan->id==$nko->id_layanan) {
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
                                <label>Target Bulan</label>
                                <input type="text"
                                    class="form-control @error('target_bulan')
                                is-invalid
                            @enderror"
                                    name="target_bulan" value="{{$nko->target_bulan}}" required>
                                @error('target_bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Realisasi Bulan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_bulan')
                                is-invalid
                            @enderror"
                                    name="realisasi_bulan" value="{{$nko->realisasi_bulan}}" required>
                                @error('realisasi_bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Target Tahun</label>
                                <input type="text"
                                    class="form-control @error('target_tahun')
                                is-invalid
                            @enderror"
                                    name="target_tahun" value="{{$nko->target_tahun}}" required>
                                @error('target_tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Realisasi Tahun</label>
                                <input type="text"
                                    class="form-control @error('realisasi_tahun')
                                is-invalid
                            @enderror"
                                    name="realisasi_tahun" value="{{$nko->realisasi_tahun}}" required>
                                @error('realisasi_tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun" value="{{$nko->tahun}}" required>
                                @error('realisasi_tahun')
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
