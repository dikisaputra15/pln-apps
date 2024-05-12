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
        Schema::create('indikatorkinerjas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit_induk');
            $table->integer('id_pelaksana');
            $table->integer('id_layanan');
            $table->integer('id_aspirasi');
            $table->string('indikator_kinerja');
            $table->integer('id_kategori');
            $table->integer('id_satuan');
            $table->integer('bobot');
            $table->integer('polaritas');
            $table->string('tahun');
            $table->string('bulan');
            $table->double('target');
            $table->double('realisasi');
            $table->double('pencapaian');
            $table->double('nilai');
            $table->string('status');
            $table->string('penjelasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikatorkinerjas');
    }
};
