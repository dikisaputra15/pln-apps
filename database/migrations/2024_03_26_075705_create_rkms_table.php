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
        Schema::create('rkms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit_induk');
            $table->integer('id_pelaksana');
            $table->integer('id_layanan');
            $table->integer('id_aspirasi');
            $table->integer('id_indikator');
            $table->integer('id_satuan');
            $table->integer('bobot');
            $table->integer('polaritas');
            $table->string('indikator_rkm');
            $table->string('satuan_rkm');
            $table->double('biaya');
            $table->string('tahun');
            $table->double('target_tahun');
            $table->double('target_bulan');
            $table->double('target_mingguan');
            $table->double('realisasi_tahun');
            $table->double('realisasi_bulan');
            $table->double('realisasi_mingguan');
            $table->double('persen_tahun');
            $table->double('persen_bulan');
            $table->double('persen_mingguan');
            $table->string('tipe_target_hasil');
            $table->string('satuan_hasil');
            $table->double('target_hasil_tahunan');
            $table->double('target_hasil_bulanan');
            $table->double('target_hasil_mingguan');
            $table->double('realisasi_hasil_tahunan');
            $table->double('realisasi_hasil_bulanan');
            $table->double('realisasi_hasil_mingguan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkms');
    }
};
