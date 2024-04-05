@extends('layouts.app')

@section('title', 'Edit Realisasi RKM')

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
                <h1>Edit Realisasi RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Realisasi RKM</h2>



                <div class="card">
                    <form action="{{ route('realisasirkm.update', $realisasirkm->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Rekap RKM</label>
                                <select class="form-control" name="id_rekap_rkm">
                                    <?php
                                        foreach ($rekaprkms as $rekaprkm) {

                                        if ($rekaprkm->id==$realisasirkm->id_rekap_rkm) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $rekaprkm->id;?>"><?php echo $rekaprkm->id; ?></option>

                                     <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>RKM</label>
                                <select class="form-control" name="id_rkm">
                                    <?php
                                        foreach ($rkms as $rkm) {

                                        if ($rkm->id==$realisasirkm->id_rkm) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $rkm->id;?>"><?php echo $rkm->nama_indikator_rkm; ?></option>

                                     <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text"
                                    class="form-control @error('id_p')
                                is-invalid
                            @enderror"
                                    name="id_p" value="{{$realisasirkm->id_p}}" required>
                                @error('id_p')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date"
                                    class="form-control @error('tanggal')
                                is-invalid
                            @enderror"
                                    name="tanggal" value="{{$realisasirkm->tanggal}}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text"
                                    class="form-control @error('alamat')
                                is-invalid
                            @enderror"
                                    name="alamat" value="{{$realisasirkm->alamat}}" required>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Daya</label>
                                <input type="number"
                                    class="form-control @error('daya')
                                is-invalid
                            @enderror"
                                    name="daya" value="{{$realisasirkm->daya}}" required>
                                @error('daya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan Hasil</label>
                                <input type="text"
                                    class="form-control @error('satuan_hasil')
                                is-invalid
                            @enderror"
                                    name="satuan_hasil" value="{{$realisasirkm->satuan_hasil}}" required>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Estimasi Hasil</label>
                                <input type="number"
                                    class="form-control @error('estimasi_hasil')
                                is-invalid
                            @enderror"
                                    name="estimasi_hasil" value="{{$realisasirkm->estimasi_hasil}}" required>
                                @error('estimasi_hasil')
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
