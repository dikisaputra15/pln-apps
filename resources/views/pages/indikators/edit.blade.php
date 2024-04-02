@extends('layouts.app')

@section('title', 'Edit Indikator')

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
                <h1>Edit Indikator</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Indikator</h2>



                <div class="card">
                    <form action="{{ route('indikator.update', $indikator) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Text</h4>
                        </div>
                        <div class="card-body">

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
                                <label>Aspirasi</label>
                                <select class="form-control" name="id_aspirasi">
                                    <?php
                                        foreach ($aspirasis as $aspirasi) {

                                        if ($aspirasi->id==$indikator->id_aspirasi) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $aspirasi->id;?>"><?php echo $aspirasi->nama_aspirasi; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Satuan</label>
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
@endpush
