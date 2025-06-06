@extends('layouts.app')

@section('title', 'Edit Realisasi RKM')

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
                <h1>Edit Realisasi RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Realisasi RKM</h2>

                <div class="card">
                    <form action="{{ route('rkmrealisasi.update', $rkmrealisasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Realisasi RKM</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Nama Unit Induk</label>
                                <select class="form-control" name="id_unit_induk" id="unit_induk">
                                    <?php
                                        foreach ($unitinduks as $unitinduk) {

                                        if ($unitinduk->id==$rkmrealisasi->id_unit_induk) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitinduk->id;?>"><?php echo $unitinduk->nama_unit_induk; ?></option>

                                     <?php } ?>

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Nama Unit Pelaksana</label>
                                <select class="form-control" name="id_pelaksana" id="unit_pelaksana">
                                    <?php
                                        foreach ($unitpelaksanas as $unitpelaksana) {

                                        if ($unitpelaksana->id==$rkmrealisasi->id_pelaksana) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitpelaksana->id;?>"><?php echo $unitpelaksana->nama_unit_pelaksana; ?></option>

                                     <?php } ?>

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Nama Unit Layanan / Bagian</label>
                                <select class="form-control" name="id_layanan" id="unit_layanan">
                                    <?php
                                        foreach ($unitlayanans as $unitlayanan) {

                                        if ($unitlayanan->id==$rkmrealisasi->id_layanan) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $unitlayanan->id;?>"><?php echo $unitlayanan->nama_unit_layanan_bagian; ?></option>

                                     <?php } ?>

                                </select>

                            </div>

                            <div class="form-group">
                                <label>Indikator Kinerja KPI</label>
                                <select class="form-control" name="indikator_kinerja_kpi">
                                    <?php
                                        foreach ($indikators as $indikator) {

                                        if ($indikator->id==$rkmrealisasi->indikator_kinerja_kpi) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $indikator->id;?>"><?php echo $indikator->indikator_kinerja; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Indikator RKM</label>
                                <select class="form-control" name="indikator_rkm">
                                    <?php
                                        foreach ($rkms as $rkm) {

                                        if ($rkm->id==$rkmrealisasi->indikator_rkm) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $rkm->id;?>"><?php echo $rkm->indikator_rkm; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="text"
                                    class="form-control @error('biaya')
                                is-invalid
                            @enderror"
                                    name="biaya" value="{{ $rkmrealisasi->biaya }}" required>
                                @error('biaya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date"
                                    class="form-control @error('tanggal')
                                is-invalid
                            @enderror"
                                    name="tanggal" value="{{ $rkmrealisasi->tanggal }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text"
                                    class="form-control @error('tahun')
                                is-invalid
                            @enderror"
                                    name="tahun" value="{{ $rkmrealisasi->tahun }}" required>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="text"
                                    class="form-control @error('bulan')
                                is-invalid
                            @enderror"
                                    name="bulan" value="{{ $rkmrealisasi->bulan }}" required>
                                @error('bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Minggu</label>
                                <input type="text"
                                    class="form-control @error('minggu')
                                is-invalid
                            @enderror"
                                    name="minggu" value="{{ $rkmrealisasi->minggu }}" required>
                                @error('minggu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Minggu Bulan</label>
                                <input type="text"
                                    class="form-control @error('minggu_bulan')
                                is-invalid
                            @enderror"
                                    name="minggu_bulan" value="{{ $rkmrealisasi->minggu_bulan }}" required>
                                @error('minggu_bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Tahun</label>
                                <input type="text"
                                    class="form-control @error('target_tahun')
                                is-invalid
                            @enderror"
                                    name="target_tahun" value="{{ $rkmrealisasi->target_tahun }}" required>
                                @error('target_tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Bulan</label>
                                <input type="text"
                                    class="form-control @error('target_bulan')
                                is-invalid
                            @enderror"
                                    name="target_bulan" value="{{ $rkmrealisasi->target_bulan }}" required>
                                @error('target_bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Mingguan</label>
                                <input type="text"
                                    class="form-control @error('target_mingguan')
                                is-invalid
                            @enderror"
                                    name="target_mingguan" value="{{ $rkmrealisasi->target_mingguan }}" required>
                                @error('target_mingguan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Harian</label>
                                <input type="text"
                                    class="form-control @error('target_harian')
                                is-invalid
                            @enderror"
                                    name="target_harian" value="{{ $rkmrealisasi->target_harian }}" required>
                                @error('target_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Tahunan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_tahunan')
                                is-invalid
                            @enderror"
                                    name="realisasi_tahunan" value="{{ $rkmrealisasi->realisasi_tahunan }}" required>
                                @error('realisasi_tahunan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Bulanan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_bulanan')
                                is-invalid
                            @enderror"
                                    name="realisasi_bulanan" value="{{ $rkmrealisasi->realisasi_bulanan }}" required>
                                @error('realisasi_bulanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Mingguan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_mingguan')
                                is-invalid
                            @enderror"
                                    name="realisasi_mingguan" value="{{ $rkmrealisasi->realisasi_mingguan }}" required>
                                @error('realisasi_mingguan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Harian</label>
                                <input type="text"
                                    class="form-control @error('realisasi_harian')
                                is-invalid
                            @enderror"
                                    name="realisasi_harian" value="{{ $rkmrealisasi->realisasi_harian }}" required>
                                @error('realisasi_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>% Tahun</label>
                                <input type="text"
                                    class="form-control @error('persen_tahun')
                                is-invalid
                            @enderror"
                                    name="persen_tahun" value="{{ $rkmrealisasi->persen_tahun }}" required>
                                @error('persen_tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>% Bulan</label>
                                <input type="text"
                                    class="form-control @error('persen_bulan')
                                is-invalid
                            @enderror"
                                    name="persen_bulan" value="{{ $rkmrealisasi->persen_bulan }}" required>
                                @error('persen_bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>% Minggu</label>
                                <input type="text"
                                    class="form-control @error('persen_minggu')
                                is-invalid
                            @enderror"
                                    name="persen_minggu" value="{{ $rkmrealisasi->persen_minggu }}" required>
                                @error('persen_minggu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tipe Target Hasil</label>
                                <input type="text"
                                    class="form-control @error('tipe_target_hasil')
                                is-invalid
                            @enderror"
                                    name="tipe_target_hasil" value="{{ $rkmrealisasi->tipe_target_hasil }}" required>
                                @error('tipe_target_hasil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan Hasil</label>
                                <select class="form-control" name="satuan_hasil">
                                    <?php
                                        foreach ($satuans as $satuan) {

                                        if ($satuan->id==$rkmrealisasi->satuan_hasil) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $satuan->id;?>"><?php echo $satuan->nama_satuan; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Target Hasil Tahunan</label>
                                <input type="text"
                                    class="form-control @error('target_hasil_tahunan')
                                is-invalid
                            @enderror"
                                    name="target_hasil_tahunan" value="{{ $rkmrealisasi->target_hasil_tahunan }}" required>
                                @error('target_hasil_tahunan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Hasil Bulanan</label>
                                <input type="text"
                                    class="form-control @error('target_hasil_bulanan')
                                is-invalid
                            @enderror"
                                    name="target_hasil_bulanan" value="{{ $rkmrealisasi->target_hasil_bulanan }}"  required>
                                @error('target_hasil_bulanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Hasil Mingguan</label>
                                <input type="text"
                                    class="form-control @error('target_hasil_mingguan')
                                is-invalid
                            @enderror"
                                    name="target_hasil_mingguan" value="{{ $rkmrealisasi->target_hasil_mingguan }}"  required>
                                @error('target_hasil_mingguan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Hasil Harian</label>
                                <input type="text"
                                    class="form-control @error('target_hasil_harian')
                                is-invalid
                            @enderror"
                                    name="target_hasil_harian" value="{{ $rkmrealisasi->target_hasil_harian }}"  required>
                                @error('target_hasil_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Hasil Tahunan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_hasil_tahunan')
                                is-invalid
                            @enderror"
                                    name="realisasi_hasil_tahunan" value="{{ $rkmrealisasi->realisasi_hasil_tahunan }}"  required>
                                @error('realisasi_hasil_tahunan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Hasil Bulanan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_hasil_bulanan')
                                is-invalid
                            @enderror"
                                    name="realisasi_hasil_bulanan" value="{{ $rkmrealisasi->realisasi_hasil_bulanan }}" required>
                                @error('realisasi_hasil_bulanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Hasil Mingguan</label>
                                <input type="text"
                                    class="form-control @error('realisasi_hasil_mingguan')
                                is-invalid
                            @enderror"
                                    name="realisasi_hasil_mingguan" value="{{ $rkmrealisasi->realisasi_hasil_mingguan }}" required>
                                @error('realisasi_hasil_mingguan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Hasil Harian</label>
                                <input type="text"
                                    class="form-control @error('realisasi_hasil_harian')
                                is-invalid
                            @enderror"
                                    name="realisasi_hasil_harian" value="{{ $rkmrealisasi->realisasi_hasil_harian }}" required>
                                @error('realisasi_hasil_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
                var id_unit_induk = $('#unit_induk').val();
                if(id_unit_induk != '')
                {
                    $.ajax({
                        type : 'POST',
                        url : "{{url('fetchlayanan')}}",
                        data : {unit_induk:id_unit_induk},

                        success: function(data)
                        {
                            $('#unit_pelaksana').html(data);
                        }
                    });
                }
                else
                {
                    $('#unit_pelaksana').html('<option value="">Select Unit Pelaksana</option>');
                }
            });

            $('#unit_pelaksana').change(function(){
                let id_unit_pelaksana = $('#unit_pelaksana').val();

                $.ajax({
                    type : 'POST',
                    url : "{{url('fetchpelaksana')}}",
                    data : {unit_pelaksana:id_unit_pelaksana},

                    success: function(data)
                    {
                        $('#unit_layanan').html(data);
                    }
                });
            });

    });
</script>

@endpush
