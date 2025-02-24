@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">

        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .peta-container {
                position: relative;
                width: 800px;
                height: 600px;
                background-color: #cce5ff;
                margin: 20px auto;
                border: 2px solid #000;
            }
            .wilayah {
                position: absolute;
                border: 2px solid #000;
                text-align: center;
                font-size: 14px;
                color: #fff;
                padding: 5px;
                font-weight: bold;
            }
            .banten-utara { background: #ffcc00; width: 150px; height: 100px; top: 50px; left: 200px; }
            .banten-selatan { background: #ff6600; width: 200px; height: 120px; top: 300px; left: 180px; }
            .serpong { background: #ff3300; width: 100px; height: 80px; top: 200px; left: 400px; }
            .cikupa { background: #cc0000; width: 120px; height: 90px; top: 300px; left: 400px; }
            .teluknaga { background: #990000; width: 130px; height: 70px; top: 100px; left: 360px; }
            .cikokol { background: #660000; width: 100px; height: 100px; top: 180px; left: 250px; }
        </style>

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Info Grafis</h1>
            </div>
            <div class="row">
                <div class="card-body">

                    <div class="peta-container">
                        <div class="wilayah banten-utara">UP3 Banten Utara</div>
                        <div class="wilayah banten-selatan">UP3 Banten Selatan</div>
                        <div class="wilayah serpong">UP3 Serpong</div>
                        <div class="wilayah cikupa">UP3 Cikupa</div>
                        <div class="wilayah teluknaga">UP3 Teluknaga</div>
                        <div class="wilayah cikokol">UP3 Cikokol</div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
