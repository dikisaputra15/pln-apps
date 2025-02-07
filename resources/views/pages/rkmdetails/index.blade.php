@extends('layouts.app')

@section('title', 'RKM Detail')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>RKM Detail</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">RKM Detail</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>RKM Detail</h4>
                            </div>
                            <div class="card-body">

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Induk</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Unit Layanan / Bagian</th>
                                            <th>Indikator Kinerja KPI</th>
                                            <th>satuan KPI</th>
                                            <th>bobot RKM</th>
                                            <th>polaritas RKM</th>
                                            <th>Indikator RKM</th>
                                            <th>Satuan RKM</th>
                                            <th>Id Pelanggan</th>
                                            <th>Uraian Nama</th>
                                            <th>Tanggal</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($indikators as $indikator)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$indikator->nama_unit_induk}}</td>
                                                <td>{{$indikator->nama_unit_pelaksana}}</td>
                                                <td>{{$indikator->nama_unit_layanan_bagian}}</td>
                                                <td>{{$indikator->indikator_kinerja}}</td>
                                                <td>{{$indikator->nama_satuan_kpi}}</td>
                                                <td>{{$indikator->bobot_rkm}}</td>
                                                <td>{{$indikator->polaritas_rkm}}</td>
                                                <td>{{$indikator->indikator_rkm}}</td>
                                                <td>{{$indikator->nama_satuan_rkm}}</td>
                                                <td>{{$indikator->id_pel}}</td>
                                                <td>{{$indikator->uraian_nama}}</td>
                                                <td>{{$indikator->tanggal}}</td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{$indikators->withQueryString()->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@push('scripts')


@endpush
