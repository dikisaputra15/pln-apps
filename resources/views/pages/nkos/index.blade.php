@extends('layouts.app')

@section('title', 'NKO')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>NKO</h1>
                <div class="section-header-button">
                    <a href="{{route('nko.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">NKO</h2>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Indikator</h4>
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
                                            <th>Target Bulan</th>
                                            <th>Realisasi Bulan<th>
                                            <th>Target Tahun</th>
                                            <th>Realisasi Tahun</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($nkos as $nko)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$nko->nama_unit_induk}}</td>
                                                <td>{{$nko->nama_unit_pelaksana}}</td>
                                                <td>{{$nko->nama_unit_layanan_bagian}}</td>
                                                <td>{{$nko->target_bulan}}</td>
                                                <td>{{$nko->realisasi_bulan}}</td>
                                                <td>{{$nko->target_tahun}}</td>
                                                <td>{{$nko->realisasi_tahun}}</td>
                                                <td>{{$nko->tahun}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('nko.edit', $nko->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('nko.destroy', $nko->id) }}" method="POST"
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
                                    {{$nkos->withQueryString()->links()}}
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
