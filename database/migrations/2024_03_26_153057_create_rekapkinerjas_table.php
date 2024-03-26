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
        Schema::create('rekapkinerjas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_aspirasi');
            $table->integer('id_indikator');
            $table->integer('id_unit_induk');
            $table->integer('id_pelaksana');
            $table->integer('id_layanan');
            $table->string('tahun');
            $table->string('bulan');
            $table->integer('target');
            $table->double('realisasi');
            $table->double('pencapaian');
            $table->double('nilai');
            $table->string('status');
            $table->text('penjelasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapkinerjas');
    }
};
