<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rkmrealisasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit_induk');
            $table->integer('id_pelaksana');
            $table->integer('id_layanan');
            $table->integer('indikator_kinerja_kpi');
            $table->integer('indikator_rkm');
            $table->double('biaya');
            $table->date('tanggal');
            $table->string('tahun');
            $table->string('bulan');
            $table->string('minggu');
            $table->string('minggu_bulan');
            $table->double('target_tahun');
            $table->double('target_bulan');
            $table->double('target_mingguan');
            $table->double('target_harian');
            $table->double('realisasi_tahunan');
            $table->double('realisasi_bulanan');
            $table->double('realisasi_mingguan');
            $table->double('realisasi_harian');
            $table->double('persen_tahun');
            $table->double('persen_bulan');
            $table->double('persen_minggu');
            $table->string('tipe_target_hasil');
            $table->string('satuan_hasil');
            $table->double('target_hasil_tahunan');
            $table->double('target_hasil_bulanan');
            $table->double('target_hasil_mingguan');
            $table->double('target_hasil_harian');
            $table->double('realisasi_hasil_tahunan');
            $table->double('realisasi_hasil_bulanan');
            $table->double('realisasi_hasil_mingguan');
            $table->double('realisasi_hasil_harian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkmrealisasis');
    }
};
