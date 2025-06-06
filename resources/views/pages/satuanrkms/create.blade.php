@extends('layouts.app')

@section('title', 'Satuan RKM Forms')

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
                <h1>Add Satuan RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Satuan RKM</h2>



                <div class="card">
                    <form action="{{ route('satrkm.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Satuan RKM</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Satuan RKM</label>
                                <input type="text"
                                    class="form-control @error('nama_satuan_rkm')
                                is-invalid
                            @enderror"
                                    name="nama_satuan_rkm">
                                @error('nama_satuan_rkm')
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
