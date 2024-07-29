@extends('layouts.app')

@section('title', 'Edit Unit Pelaksana')

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
                <h1>Edit Unit Pelaksana</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Unit Pelaksana</h2>



                <div class="card">
                    <form action="/upel/updateupel" method="POST">
                        @csrf

                        <div class="card-header">
                            <h4>Edit Text</h4>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" name="id_unit_pelaksana" value="{{ $unitpelaksana->id }}" hidden>
                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk">
                                    <?php
                                        foreach ($unitinduks as $unitinduk) {

                                        if ($unitinduk->id==$unitpelaksana->id_unit_induk) {
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
                                <input type="text"
                                    class="form-control @error('nama_unit_pelaksana')
                                is-invalid
                            @enderror"
                                    name="nama_unit_pelaksana" value="{{ $unitpelaksana->nama_unit_pelaksana }}">
                                @error('nama_unit_pelaksana')
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
