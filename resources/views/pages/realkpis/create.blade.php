@extends('layouts.app')

@section('title', 'Realisasi KPI')

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
                <h1>Realisasi KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Realisasi KPI</h2>



                <div class="card">
                    <form action="{{ route('realkpi.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Realisasi KPI</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Indikator Kinerja KPI</label>
                                <select class="form-control" name="id_indikator_kpi" id="id_indikator_kpi">
                                        <option>-Pilih Indikator-</option>
                                    @foreach ($indikators as $indikator)
                                        <option value="{{$indikator->id}}">{{$indikator->indikator_kinerja}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number"
                                    class="form-control @error('bobot')
                                is-invalid
                            @enderror"
                                    name="bobot">
                                @error('bobot')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Polaritas</label>
                                <select class="form-control" name="polaritas">
                                    <option value="0">-Pilih Polaritas-</option>
                                    <option value="1">Positif</option>
                                    <option value="2">Negatif</option>
                                    <option value="3">Range</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun">
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
                                    name="bulan">
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
                                    name="target">
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
                                    name="realisasi">
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
                                    name="penjelasan">
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
