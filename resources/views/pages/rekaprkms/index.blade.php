@extends('layouts.app')

@section('title', 'Rekap RKM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekap RKM</h1>
                <div class="section-header-button">
                    <a href="{{route('rekaprkm.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Rekap RKM</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rekap RKM</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{route('rekaprkm.index')}}">
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
                                            <th>Nama Indiktor RKM</th>
                                            <th>Penjelasan</th>
                                            <th>Target Harian</th>
                                            <th>Realisasi Harian</th>
                                            <th>Biaya</th>
                                            <th>Tanggal</th>
                                            <th>Tahun</th>
                                            <th>Satuan Hasil</th>
                                            <th>Target Hasil</th>
                                            <th>Realisasi Hasil</th>
                                            <th>Kendala</th>
                                            <th>Mitigasi</th>
                                            <th>Photo Evident</th>
                                            <th>Action</th>
                                        </tr>

                                        @php($i = 1)
                                        @foreach ($rekaprkms as $rekaprkm)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$rekaprkm->nama_indikator_rkm}}</td>
                                                <td>{{$rekaprkm->penjelasan}}</td>
                                                <td>{{$rekaprkm->target_harian}}</td>
                                                <td>{{$rekaprkm->realisasi_harian}}</td>
                                                <td>{{$rekaprkm->biaya}}</td>
                                                <td>{{$rekaprkm->tanggal}}</td>
                                                <td>{{$rekaprkm->tahun}}</td>
                                                <td>{{$rekaprkm->satuan_hasil}}</td>
                                                <td>{{$rekaprkm->target_hasil}}</td>
                                                <td>{{$rekaprkm->realisasi_hasil}}</td>
                                                <td>{{$rekaprkm->kendala}}</td>
                                                <td>{{$rekaprkm->mitigasi}}</td>
                                                <td><img src="/image/evident/{{$rekaprkm->photo_evident}}" style="width:60px; height:60px;"></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('rekaprkm.edit', $rekaprkm->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('rekaprkm.destroy', $rekaprkm->id) }}" method="POST"
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
                                    {{$rekaprkms->withQueryString()->links()}}
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
