@extends('layouts.app')

@section('title', 'Edit Sub KPI')

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
                <h1>Edit Sub KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Sub KPI</h2>



                <div class="card">
                    <form action="/subkpi/update" method="POST">
                        @csrf

                        <div class="card-header">
                            <h4>Edit Sub KPI</h4>
                        </div>
                        <div class="card-body">

                            <input type="text" class="form-control" name="id" value="{{ $realkpi->id }}" hidden>

                            <div class="form-group">
                                <label>Sub KPI</label>
                                <input type="text"
                                    class="form-control @error('nama_sub_kpi')
                                is-invalid
                            @enderror"
                                    name="nama_sub_kpi" value="{{ $realkpi->nama_sub_kpi }}">
                                @error('nama_sub_kpi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Bobot Sub KPI</label>
                                <input type="text"
                                    class="form-control @error('bobot_subkpi')
                                is-invalid
                            @enderror"
                                    name="bobot_subkpi" value="{{ $realkpi->bobot_subkpi }}">
                                @error('bobot_subkpi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')

@endpush
