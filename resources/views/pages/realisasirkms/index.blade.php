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
                    <a href="{{route('realisasirkm.create')}}"
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
                                    <form method="GET" action="{{route('realisasirkm.index')}}">
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
                                            <th>Rekap RKM</th>
                                            <th>RKM</th>
                                            <th>Id</th>
                                            <th>Tanggal</th>
                                            <th>Alamat</th>
                                            <th>Daya</th>
                                            <th>Satuan Hasil</th>
                                            <th>Estimasi Hasil</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($realisasirkms as $realisasirkm)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$realisasirkm->id}}</td>
                                                <td>{{$realisasirkm->nama_indikator_rkm}}</td>
                                                <td>{{$realisasirkm->id_p}}</td>
                                                <td>{{$realisasirkm->tanggal}}</td>
                                                <td>{{$realisasirkm->alamat}}</td>
                                                <td>{{$realisasirkm->daya}}</td>
                                                <td>{{$realisasirkm->satuan_hasil}}</td>
                                                <td>{{$realisasirkm->estimasi_hasil}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('realisasirkm.edit', $realisasirkm->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('realisasirkm.destroy', $realisasirkm->id) }}" method="POST"
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
                                    {{$realisasirkms->withQueryString()->links()}}
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