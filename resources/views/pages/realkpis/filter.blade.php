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
                <div class="section-header-button">
                    <a href="{{route('realkpi.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>

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
                                        <option value="0">Semua</option>
                                    @foreach ($unitinduks as $unitinduk)
                                        <option value="{{$unitinduk->id}}">{{$unitinduk->nama_unit_induk}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Unit Pelaksana</label>
                                 <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <option value="0">Semua</option>
                                 </select>
                            </div>
                            <div class="col-md-2">
                                <label>Nama Unit Layanan</label>
                                 <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <option value="0">Semua</option>
                                 </select>
                            </div>

                            <div class="col-md-2">
                        <label>Bulan</label>
                        <select id="bulan" name="bulan" class="form-control">
                            <option value="">Semua</option>
                            <option value="JAN">JAN</option>
                            <option value="FEB">FEB</option>
                            <option value="MAR">MAR</option>
                            <option value="APR">APR</option>
                            <option value="MEI">MEI</option>
                            <option value="JUN">JUN</option>
                            <option value="JUL">JUL</option>
                            <option value="AGU">AGU</option>
                            <option value="SEP">SEP</option>
                            <option value="OKT">OKT</option>
                            <option value="NOV">NOV</option>
                            <option value="DES">DES</option>
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

                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                    <table class="table-striped table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Indikator Kinerja KPI</th>
                                <th>Bobot</th>
                                <th>Polaritas</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>Pencapaian</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                                @foreach ($indikators as $indikator)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $indikator->indikator_kinerja }}</td>
                                        <td>{{ $indikator->bobot }}</td>
                                        <td>{{ $indikator->polaritas }}</td>
                                        <td>{{ $indikator->tahun }}</td>
                                        <td>{{ $indikator->bulan }}</td>
                                        <td>{{ $indikator->target }}</td>
                                        <td>{{ $indikator->realisasi }}</td>
                                        <td>{{ $indikator->pencapaian }}</td>
                                        <td>{{ $indikator->nilai }}</td>
                                        <td>{{ $indikator->status }}</td>
                                        <td>{{ $indikator->penjelasan }}</td>
                                    </tr>
                                @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9" class="text-right"><b>NKO</b></td>
                                <td colspan="4">
                                    <b>{{ $indikators->sum('nilai') }}</b>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
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
                $('#unit_pelaksana').html('<option value="">Semua</option>');
                $('#unit_layanan').html('<option value="">Semua</option>');

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
                 $('#unit_layanan').html('<option value="">Semua</option>');

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
