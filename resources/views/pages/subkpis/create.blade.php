@extends('layouts.app')

@section('title', 'Sub KPI Forms')

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
                <h1>Sub KPI</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Sub KPI</h2>



                <div class="card">
                    <form action="{{ route('subkpi.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>KPi</label>
                                <select class="form-control" name="id_kpi">
                                        <option value="0">-Pilih KPI-</option>
                                    @foreach ($kpis as $kpi)
                                        <option value="{{$kpi->id}}">{{$kpi->indikator_kinerja}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Sub KPI</label>
                                <input type="text"
                                    class="form-control @error('nama_sub_kpi')
                                is-invalid
                            @enderror"
                                    name="nama_sub_kpi">
                                @error('nama_sub_kpi')
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
