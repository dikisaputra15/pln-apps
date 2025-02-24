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
                                <label>Jenis Indikator</label>
                                <select class="form-control" name="polaritas">
                                    <option value="0" {{ isset($indikator) && $indikator->polaritas == 0 ? 'selected' : '' }}>-Pilih Jenis Indikator-</option>
                                    <option value="Key Performance Indicator" {{ isset($indikator) && $indikator->jenis_indikator == 'Key Performance Indicator' ? 'selected' : '' }}>Key Performance Indicator</option>
                                    <option value="Performance Indikator" {{ isset($indikator) && $indikator->jenis_indikator == 'Performance Indikator' ? 'selected' : '' }}>Performance Indikator</option>
                                </select>
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
                                <select class="form-control" name="polaritas">
                                    <option value="0" {{ isset($indikator) && $indikator->polaritas == 0 ? 'selected' : '' }}>-Pilih Polaritas-</option>
                                    <option value="3" {{ isset($indikator) && $indikator->polaritas == 3 ? 'selected' : '' }}>Positif</option>
                                    <option value="1" {{ isset($indikator) && $indikator->polaritas == 1 ? 'selected' : '' }}>Negatif</option>
                                    <option value="Range" {{ isset($indikator) && $indikator->polaritas == 'Range' ? 'selected' : '' }}>Range</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun" value="{{ $indikator->tahun }}">
                                @error('tahun')
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
