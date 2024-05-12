@extends('layouts.app')

@section('title', 'RKM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>RKM</h1>
                <div class="section-header-button">
                    <a href="{{route('rkm.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">RKM</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>RKM</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{route('nko.index')}}">
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
                                            <th>Unit Layanan</th>
                                            <th>Aspirasi</th>
                                            <th>Indikator KPI</th>
                                            <th>Satuan KPI</th>
                                            <th>Bobot</th>
                                            <th>Polaritas</th>
                                            <th>Indikator RKM</th>
                                            <th>Satuan RKM</th>
                                            <th>Biaya</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($rkms as $rkm)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$rkm->nama_unit_induk}}</td>
                                                <td>{{$rkm->nama_unit_pelaksana}}</td>
                                                <td>{{$rkm->nama_unit_layanan_bagian}}</td>
                                                <td>{{$rkm->nama_aspirasi}}</td>
                                                <td>{{$rkm->indikator_kinerja}}</td>
                                                <td>{{$rkm->nama_satuan}}</td>
                                                <td>{{$rkm->bobot}}</td>
                                                <td>{{$rkm->polaritas}}</td>
                                                <td>{{$rkm->indikator_rkm}}</td>
                                                <td>{{$rkm->satuan_rkm}}</td>
                                                <td>{{$rkm->biaya}}</td>
                                                <td>{{$rkm->tahun}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="/rkm/<?php echo $rkm->id ?>/viewrkm"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-eye"></i>
                                                            View
                                                        </a>

                                                        <a href='{{ route('rkm.edit', $rkm->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('rkm.destroy', $rkm->id) }}" method="POST"
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
                                    {{$rkms->withQueryString()->links()}}
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
