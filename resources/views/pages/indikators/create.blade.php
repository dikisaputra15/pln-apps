@extends('layouts.app')

@section('title', 'Indikator')

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
                <h1>Indikator</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Indikator</h2>



                <div class="card">
                    <form action="{{ route('indikator.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori">
                                        <option>-Pilih Kategori-</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Aspirasi</label>
                                <select class="form-control" name="id_aspirasi">
                                        <option>-Pilih Aspirasi-</option>
                                    @foreach ($aspirasis as $aspirasi)
                                        <option value="{{$aspirasi->id}}">{{$aspirasi->nama_aspirasi}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Satuan</label>
                                <select class="form-control" name="id_satuan">
                                        <option>-Pilih Satuan-</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{$satuan->id}}">{{$satuan->nama_satuan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Indikator Kinerja</label>
                                <input type="text"
                                    class="form-control @error('indikator_kinerja')
                                is-invalid
                            @enderror"
                                    name="indikator_kinerja">
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
                                    name="bobot">
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
                                    name="polaritas">
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
