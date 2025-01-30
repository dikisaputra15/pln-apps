@extends('layouts.app')

@section('title', 'Realisasi RKM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Realisasi RKM</h1>
                <div class="section-header-button">
                    <a href="{{route('rkmrealisasi.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Realisasi RKM</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Realisasi RKM</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{route('rkmrealisasi.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Induk</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Unit Layanan / Bagian</th>
                                            <th>Aspirasi</th>
                                            <th>Indikator Kinerja KPI</th>
                                            <th>Satuan KPI</th>
                                            <th>Bobot</th>
                                            <th>Polaritas</th>
                                            <th>Indikator RKM</th>
                                            <th>Satuan RKM</th>
                                            <th>Biaya</th>
                                            <th>Tanggal</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Minggu</th>
                                            <th>Minggu Bulan</th>
                                            <th>Target Tahun</th>
                                            <th>Target Bulan</th>
                                            <th>Target Mingguan</th>
                                            <th>Target Harian</th>
                                            <th>Realisasi Tahunan</th>
                                            <th>Realisasi Bulanan</th>
                                            <th>Realisasi Mingguan</th>
                                            <th>Realisasi Harian</th>
                                            <th>% Tahun</th>
                                            <th>% Bulan</th>
                                            <th>% Minggu</th>
                                            <th>Tipe Target Hasil</th>
                                            <th>Satuan Hasil</th>
                                            <th>Target Hasil Tahunan</th>
                                            <th>Target Hasil Bulanan</th>
                                            <th>Target Hasil Mingguan</th>
                                            <th>Target Hasil Harian</th>
                                            <th>Realisasi Hasil Tahunan</th>
                                            <th>Realisasi Hasil Bulanan</th>
                                            <th>Realisasi Hasil Mingguan</th>
                                            <th>Realisasi Hasil Harian</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($rkmrealisasis as $rkmrealisasi)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$rkmrealisasi->nama_unit_induk}}</td>
                                                <td>{{$rkmrealisasi->nama_unit_pelaksana}}</td>
                                                <td>{{$rkmrealisasi->nama_unit_layanan_bagian}}</td>
                                                <td>{{$rkmrealisasi->aspirasi}}</td>
                                                <td>{{$rkmrealisasi->indikator_kinerja}}</td>
                                                <td>{{$rkmrealisasi->nama_satuan_kpi}}</td>
                                                <td>{{$rkmrealisasi->bobot}}</td>
                                                <td>{{$rkmrealisasi->polaritas}}</td>
                                                <td>{{$rkmrealisasi->indikator_rkm}}</td>
                                                <td>{{$rkmrealisasi->nama_satuan_rkm}}</td>
                                                <td>{{$rkmrealisasi->biaya}}</td>
                                                <td>{{$rkmrealisasi->tanggal}}</td>
                                                <td>{{$rkmrealisasi->tahun}}</td>
                                                <td>{{$rkmrealisasi->bulan}}</td>
                                                <td>{{$rkmrealisasi->minggu}}</td>
                                                <td>{{$rkmrealisasi->minggu_bulan}}</td>
                                                <td>{{$rkmrealisasi->target_tahun}}</td>
                                                <td>{{$rkmrealisasi->target_bulan}}</td>
                                                <td>{{$rkmrealisasi->target_mingguan}}</td>
                                                <td>{{$rkmrealisasi->target_harian}}</td>
                                                <td>{{$rkmrealisasi->realisasi_tahunan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_bulanan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_mingguan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_harian}}</td>
                                                <td>{{$rkmrealisasi->persen_tahun}}</td>
                                                <td>{{$rkmrealisasi->persen_bulan}}</td>
                                                <td>{{$rkmrealisasi->persen_minggu}}</td>
                                                <td>{{$rkmrealisasi->tipe_target_hasil}}</td>
                                                <td>{{$rkmrealisasi->satuan_hasil}}</td>
                                                <td>{{$rkmrealisasi->target_hasil_tahunan}}</td>
                                                <td>{{$rkmrealisasi->target_hasil_bulanan}}</td>
                                                <td>{{$rkmrealisasi->target_hasil_mingguan}}</td>
                                                <td>{{$rkmrealisasi->target_hasil_harian}}</td>
                                                <td>{{$rkmrealisasi->realisasi_hasil_tahunan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_hasil_bulanan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_hasil_mingguan}}</td>
                                                <td>{{$rkmrealisasi->realisasi_hasil_harian}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('rkmrealisasi.edit', $rkmrealisasi->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('rkmrealisasi.destroy', $rkmrealisasi->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{$rkmrealisasis->withQueryString()->links()}}
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script>
        $('.confirm-delete').on('click', function() {
        // var question= confirm("Do you really want me delete this?");
        if (confirm('Are you sure?')) {} else {
            return false;
        }
        });
    </script>
@endpush
