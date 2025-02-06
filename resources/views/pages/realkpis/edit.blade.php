@extends('layouts.app')

@section('title', 'Edit Realisasi KPI')

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
                <h1>Edit Realisasi KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Realisasi KPI</h2>



                <div class="card">
                    <form action="{{ route('realkpi.update', $realkpi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h4>Edit Realisasi KPI</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Indikator Kinerja KPI</label>
                                <select class="form-control" name="id_indikator_kpi" id="id_indikator_kpi">
                                    <?php
                                        foreach ($indikators as $indikator) {

                                        if ($realkpi->id_indikator_kpi==$indikator->id) {
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
                                <label>Bobot</label>
                                <input type="number"
                                    class="form-control @error('bobot')
                                is-invalid
                            @enderror"
                                    name="bobot" value="{{ $realkpi->bobot }}">
                                @error('bobot')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Polaritas</label>
                                <select class="form-control" name="polaritas">
                                    <option value="0" {{ isset($realkpi) && $realkpi->polaritas == 0 ? 'selected' : '' }}>-Pilih Polaritas-</option>
                                    <option value="1" {{ isset($realkpi) && $realkpi->polaritas == 1 ? 'selected' : '' }}>Positif</option>
                                    <option value="2" {{ isset($realkpi) && $realkpi->polaritas == 2 ? 'selected' : '' }}>Negatif</option>
                                    <option value="3" {{ isset($realkpi) && $realkpi->polaritas == 3 ? 'selected' : '' }}>Range</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun" value="{{ $realkpi->tahun }}">
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
                                    name="bulan" value="{{ $realkpi->bulan }}">
                                @error('bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target</label>
                                <input type="text"
                                    class="form-control @error('target')
                                is-invalid
                            @enderror"
                                    name="target" value="{{ $realkpi->target }}">
                                @error('target')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi</label>
                                <input type="text"
                                    class="form-control @error('realisasi')
                                is-invalid
                            @enderror"
                                    name="realisasi" value="{{ $realkpi->realisasi }}">
                                @error('realisasi')
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
                                    name="penjelasan" value="{{ $realkpi->penjelasan }}">
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

@endpush
