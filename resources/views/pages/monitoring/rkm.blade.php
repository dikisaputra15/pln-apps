@extends('layouts.app')

@section('title', 'Mitigasi Risiko RKM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mitigasi Risiko RKM</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="section-header">
                                <h5>Filter Data</h5>
                            </div>
                        <form action="{{ url('filter') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control">
                                            <option>Unit</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control">
                                            <option>Bulan</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div><br>


                            <div class="col-12">
                                <div class="row">
                                    <div class="card">
                                        <img src="/img/rkm.png">
                                    </div>
                                </div>
                            </div><br>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
