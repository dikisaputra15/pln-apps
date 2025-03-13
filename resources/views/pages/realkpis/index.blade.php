@extends('layouts.app')

@section('title', 'Realisasi KPI')

@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Realisasi KPI</h1>
                <!-- <div class="section-header-button">
                    <a href="{{route('realkpi.create')}}"
                        class="btn btn-primary">Add New</a>
                </div> -->
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

            <form action="/filter" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                    <option value="1">Semua</option>
                                    @foreach ($unitinduks as $unitinduk)
                                        <option value="{{$unitinduk->id}}" {{ $unitinduk->id == $default ? 'selected' : '' }}>{{$unitinduk->nama_unit_induk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Unit Pelaksana</label>
                                 <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <option value="1">Semua</option>
                                 </select>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Unit Layanan</label>
                                 <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <option value="1">Semua</option>
                                 </select>
                            </div>

                            <div class="col-md-2">
                        <label>Bulan</label>
                        <select id="bulan" name="bulan" class="form-control">
                            <option value="01" {{ $currentmonth == '01' ? 'selected' : '' }}>JAN</option>
                            <option value="02" {{ $currentmonth == '02' ? 'selected' : '' }}>FEB</option>
                            <option value="03" {{ $currentmonth == '03' ? 'selected' : '' }}>MAR</option>
                            <option value="04" {{ $currentmonth == '04' ? 'selected' : '' }}>APR</option>
                            <option value="05" {{ $currentmonth == '05' ? 'selected' : '' }}>MEI</option>
                            <option value="06" {{ $currentmonth == '06' ? 'selected' : '' }}>JUN</option>
                            <option value="07" {{ $currentmonth == '07' ? 'selected' : '' }}>JUL</option>
                            <option value="08" {{ $currentmonth == '08' ? 'selected' : '' }}>AGU</option>
                            <option value="09" {{ $currentmonth == '09' ? 'selected' : '' }}>SEP</option>
                            <option value="10" {{ $currentmonth == '10' ? 'selected' : '' }}>OKT</option>
                            <option value="11" {{ $currentmonth == '11' ? 'selected' : '' }}>NOV</option>
                            <option value="12" {{ $currentmonth == '12' ? 'selected' : '' }}>DES</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun">
                    </div>

                    <div class="col-md-2">

                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                        <a href="{{ route('realkpi.index') }}" class="btn btn-secondary mt-4">Reset</a>
                    </div>

                </div>

            </form>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Realisasi KPI</h4>
                            </div>

                            <div class="card-body">

                            <div class="mb-3">
                                <a href="{{ route('realkpi.export') }}" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>

                                <!-- <form action="{{ route('realkpi.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    <input type="file" name="file" required>
                                    <button type="submit" class="btn btn-primary">Import Excel</button>
                                </form> -->

                                <button class="btn btn-warning btn-icon upload-btn d-inline ml-2">
                                    <i class="fas fa-upload"></i> Import Excel
                                </button>
                            </div>


                            <p>Realisasi dibuat otomatis ketika KPI di buat dan bisa diupdate dengan cara export excel dan akan update ketika data excel diimport</p>


                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Indikator Kinerja</th>
                                                <th>Bulan</th>
                                                <th>Target</th>
                                                <th>Realisasi</th>
                                                <th>Pencapaian</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($kpis as $kpi)
                                                <tr class="bg-primary text-white">
                                                    <td>{{ $no++ }}</td>
                                                    <td colspan="6"><strong>{{ strtoupper($kpi->jenis_indikator) }}</strong></td>
                                                </tr>

                                                <tr class="bg-warning">
                                                    <td></td>
                                                    <td colspan="6"><strong>{{ $kpi->indikator_kinerja }}</strong></td>
                                                </tr>

                                                @foreach ($kpi->subkpis as $subkpi)
                                                    <tr class="bg-light">
                                                        <td></td>
                                                        <td><strong>{{ $subkpi->nama_subkpi }}</strong></td>
                                                        <td colspan="4"></td>
                                                    </tr>

                                                    @foreach ($subkpi->realkpis as $realisasi)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{ $realisasi->bulan }}</td>
                                                            <td>{{ $realisasi->target }}</td>
                                                            <td>{{ $realisasi->realisasi }}</td>
                                                            <td>{{ $realisasi->pencapaian }}%</td>
                                                            <td>{{ $realisasi->nilai }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>

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
                <form action="{{ route('realkpi.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
                let uploadModal = new bootstrap.Modal(document.getElementById("uploadModal"));
                uploadModal.show();
            });
        });
    });
</script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

            $('#unit_induk').change(function(){
                let id_unit_induk = $('#unit_induk').val();

                 // Set default "Semua" di Unit Pelaksana dan Unit Layanan
                $('#unit_pelaksana').html('<option value="1">Semua</option>');
                $('#unit_layanan').html('<option value="1">Semua</option>');

                if(id_unit_induk != '')
                {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchlayanan')}}",
                        data : {unit_induk:id_unit_induk},

                        success: function(data)
                        {
                            $('#unit_pelaksana').append(data);
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr);
                        }
                    });
                }
            });

            $('#unit_pelaksana').change(function(){
                let id_unit_pelaksana = $('#unit_pelaksana').val();

                 // Set default "Semua" di Unit Layanan
                 $('#unit_layanan').html('<option value="1">Semua</option>');

                 if (id_unit_pelaksana !== '') {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchpelaksana')}}",
                        data : {unit_pelaksana:id_unit_pelaksana},

                        success: function(data)
                        {
                            $('#unit_layanan').append(data);
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr);
                         }
                    });
                }
            });

    });
</script>

    <script>
        $('.confirm-delete').on('click', function() {
        // var question= confirm("Do you really want me delete this?");
        if (confirm('Are you sure?')) {} else {
            return false;
        }
        });
    </script>

@endpush
