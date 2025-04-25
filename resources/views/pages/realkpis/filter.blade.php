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
                                        <option value="{{$unitinduk->id}}">{{$unitinduk->nama_unit_induk}}</option>
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

                                    <a href="{{ route('realkpi.export', [
                                        'id_unit_induk' => request('id_unit_induk'),
                                        'id_pelaksana' => request('id_pelaksana'),
                                        'id_layanan' => request('id_layanan'),
                                        'bulan' => request('bulan'),
                                        'tahun' => request('tahun'),
                                    ]) }}" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>

                                </div>

                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Unit Induk</th>
                                                <th>Unit Pelaksana</th>
                                                <th>Unit Layanan</th>
                                                <th>KPI / Sub KPI</th>
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
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $bulanMapping = [
                                                    '01' => 'JAN', '02' => 'FEB', '03' => 'MAR', '04' => 'APR',
                                                    '05' => 'MEI', '06' => 'JUN', '07' => 'JUL', '08' => 'AGU',
                                                    '09' => 'SEP', '10' => 'OKT', '11' => 'NOV', '12' => 'DES'
                                                ];
                                            @endphp

                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $jenisIndikator => $kpiGroupByJenis)

                                             {{-- Header Jenis Indikator --}}
                                            <tr style="background: #d1ecf1; font-weight: bold;">
                                                <td colspan="15">{{ $jenisIndikator }}</td>
                                            </tr>

                                            @foreach ($kpiGroupByJenis as $kpi_id => $kpiGroup)
                                                @php
                                                     $firstKpi = $kpiGroup->first();
                                                    $hasSubKpi = $kpiGroup->contains(function ($item) {
                                                        return !empty($item->nama_sub_kpi) && !is_null($item->nama_sub_kpi);
                                                    });
                                                @endphp

                                                <!-- Tampilkan KPI Utama  -->
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $firstKpi->unit_induk }}</td>
                                                        <td>{{ $firstKpi->unit_pelaksana }}</td>
                                                        <td>{{ $firstKpi->unit_layanan }}</td>
                                                        <td>{{ $firstKpi->indikator_kinerja }}</td>
                                                        <td>{{ $firstKpi->bobot }}</td>
                                                        <td>{{ $firstKpi->polaritas }}</td>
                                                        <td>{{ $firstKpi->tahun }}</td>
                                                        <td>{{ $bulanMapping[$firstKpi->bulan] }}</td>
                                                        <td>{{ $firstKpi->target }}</td>
                                                        <td>{{ $firstKpi->realisasi }}</td>
                                                        <td style="
                                                            @if($firstKpi->pencapaian < 95) background-color: red; color: white;
                                                            @elseif($firstKpi->pencapaian >= 95 && $indikator->pencapaian < 100) background-color: yellow; color: black;
                                                            @elseif($firstKpi->pencapaian >= 100 && $indikator->pencapaian < 109) background-color: lightgreen; color: black;
                                                            @elseif($firstKpi->pencapaian >= 110) background-color: darkgreen; color: white;
                                                            @endif">
                                                            {{ $firstKpi->pencapaian }}%
                                                        </td>

                                                        <td></td>
                                                        <td>{{ $firstKpi->status }}</td>
                                                        <td>{{ $firstKpi->penjelasan }}</td>

                                                    </tr>

                                                    @if ($hasSubKpi)
                                                        @php
                                                            $letters = range('a', 'z'); // Membuat array huruf a-z
                                                            $index = 0; // Inisialisasi index
                                                        @endphp
                                                        @foreach ($kpiGroup as $row)
                                                         @if (!is_null($row->nama_sub_kpi) && !empty($row->nama_sub_kpi))

                                                            <!-- Tampilkan Sub-KPI hanya jika ada -->
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $letters[$index] }}. {{ $row->nama_sub_kpi }}</td>
                                                        <td><a href="/subkpi/{{$row->id}}/edit">{{ $row->bobot_subkpi }}</a></td>
                                                        <td>{{ $row->polaritas }}</td>
                                                        <td>{{ $row->tahun }}</td>
                                                        <td>{{ $bulanMapping[$row->bulan] }}</td>
                                                        <td>{{ $row->target }}</td>
                                                        <td>{{ $row->realisasi }}</td>
                                                        <td style="
                                                            @if($row->pencapaian < 95) background-color: red; color: white;
                                                            @elseif($row->pencapaian >= 95 && $indikator->pencapaian < 100) background-color: yellow; color: black;
                                                            @elseif($row->pencapaian >= 100 && $indikator->pencapaian < 109) background-color: lightgreen; color: black;
                                                            @elseif($row->pencapaian >= 110) background-color: darkgreen; color: white;
                                                            @endif">
                                                            {{ $row->pencapaian }}%
                                                        </td>

                                                        <td>{{ $row->nilai }}</td>
                                                        <td>{{ $row->status }}</td>
                                                        <td>{{ $row->penjelasan }}</td>

                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="12" class="text-right"><b>NKO</b></td>
                                                <td colspan="3">
                                                    <b>{{ $totalNilai }}</b>
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
