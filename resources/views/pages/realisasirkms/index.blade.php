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
                                                <td>{{$rkmrealisasi->nama_satuan_hasil}}</td>
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

                                                        <button class="btn btn-sm btn-warning btn-icon upload-btn ml-2"
                                                        data-id="{{$rkmrealisasi->id}}">
                                                            <i class="fas fa-upload"></i> Upload
                                                        </button>

                                                        <a href='/rkmdetail/{{$rkmrealisasi->id}}/detail'
                                                            class="btn btn-sm btn-primary btn-icon ml-2">
                                                            <i class="fas fa-file"></i>
                                                            Detail
                                                        </a>
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

    <!-- Modal Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Import File Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="{{ route('rkm.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="indikator_id" id="indikator_id">
                        <div class="mb-3" hidden>
                            <label for="display_id" class="form-label">RKM ID</label>
                            <input type="text" class="form-control" id="display_id" name="rkm_id">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File</label>
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".upload-btn").forEach(button => {
            button.addEventListener("click", function() {
                let indikatorId = this.getAttribute("data-id");
                document.getElementById("indikator_id").value = indikatorId;
                document.getElementById("display_id").value = indikatorId;
                let uploadModal = new bootstrap.Modal(document.getElementById("uploadModal"));
                uploadModal.show();
            });
        });
    });
</script>

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
