@extends('layouts.app')

@section('title', 'KPI')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>KPI</h1>
                <div class="section-header-button">
                    <a href="{{route('indikator.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">KPI</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>KPI</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{route('indikator.index')}}">
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
                                            <th>Indikator Kinerja</th>
                                            <th>Jenis Indikator</th>
                                            <th>kategori</th>
                                            <th>satuan KPI</th>
                                            <th>bobot</th>
                                            <th>polaritas</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($indikators as $indikator)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$indikator->indikator_kinerja}}</td>
                                                <td>{{$indikator->jenis_indikator}}</td>
                                                <td>{{$indikator->nama_kategori}}</td>
                                                <td>{{$indikator->nama_satuan}}</td>
                                                <td>{{$indikator->bobot}}</td>
                                                <td>{{$indikator->polaritas}}</td>
                                                <td>{{$indikator->tahun}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('indikator.edit', $indikator->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('indikator.destroy', $indikator->id) }}" method="POST"
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
