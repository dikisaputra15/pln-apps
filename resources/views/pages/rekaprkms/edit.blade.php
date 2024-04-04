@extends('layouts.app')

@section('title', 'Edit Rekap RKM')

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
                <h1>Edit Rekap RKM</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Rekap RKM</h2>



                <div class="card">
                    <form action="{{ route('rekaprkm.update', $rekaprkm->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Indikator</label>
                                <select class="form-control" name="id_indikator" id="unit_indikator">
                                    <?php
                                        foreach ($indikators as $indikator) {

                                        if ($indikator->id==$rekaprkm->id_indikator) {
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
                                <label>Rekap Kinerja</label>
                                <select class="form-control" name="id_rekap_kinerja" id="id_rekap_kinerja">
                                    <?php
                                        foreach ($rekapkinerjas as $rekapkinerja) {

                                        if ($rekapkinerja->id==$rekaprkm->id_rekap_kinerja) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $rekapkinerja->id;?>"><?php echo $rekapkinerja->penjelasan; ?></option>

                                     <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Target Harian</label>
                                <input type="number"
                                    class="form-control @error('target_harian')
                                is-invalid
                            @enderror"
                                    name="target_harian" value="{{$rekaprkm->target_harian}}" required>
                                @error('target_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Realisasi Harian</label>
                                <input type="number"
                                    class="form-control @error('realisasi_harian')
                                is-invalid
                            @enderror"
                                    name="realisasi_harian" value="{{$rekaprkm->realisasi_harian}}" required>
                                @error('realisasi_harian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="number"
                                    class="form-control @error('biaya')
                                is-invalid
                            @enderror"
                                    name="biaya" value="{{$rekaprkm->biaya}}" required>
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
                                    name="tanggal" value="{{$rekaprkm->tanggal}}" required>
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
                                    name="tahun" value="{{$rekaprkm->tahun}}" required>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan Hasil</label>
                                <input type="number"
                                    class="form-control @error('satuan_hasil')
                                is-invalid
                            @enderror"
                                    name="satuan_hasil" value="{{$rekaprkm->satuan_hasil}}" required>
                                @error('satuan_hasil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Target Hasil</label>
                                <input type="number"
                                    class="form-control @error('target_hasil')
                                is-invalid
                            @enderror"
                                    name="target_hasil" value="{{$rekaprkm->target_hasil}}" required>
                                @error('target_hasil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Realisasi Hasil</label>
                                <input type="number"
                                    class="form-control @error('realisasi_hasil')
                                is-invalid
                            @enderror"
                                    name="realisasi_hasil" value="{{$rekaprkm->realisasi_hasil}}" required>
                                @error('realisasi_hasil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kendala</label>
                                <input type="text"
                                    class="form-control @error('kendala')
                                is-invalid
                            @enderror"
                                    name="kendala" value="{{$rekaprkm->kendala}}" required>
                                @error('kendala')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mitigasi</label>
                                <input type="text"
                                    class="form-control @error('mitigasi')
                                is-invalid
                            @enderror"
                                    name="mitigasi" value="{{$rekaprkm->mitigasi}}" required>
                                @error('mitigasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Photo Evident</label>
                                <input type="file"
                                    class="form-control @error('foto')
                                is-invalid
                            @enderror"
                                    name="foto" required>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <input type="text" class="form-control" name="old_foto" value="{{$rekaprkm->photo_evident}}" hidden>
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

@endpush
