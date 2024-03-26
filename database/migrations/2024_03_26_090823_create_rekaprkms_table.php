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
        Schema::create('rekaprkms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rkm');
            $table->integer('id_rekap_kinerja');
            $table->double('target_harian');
            $table->double('realisasi_harian');
            $table->integer('biaya');
            $table->date('tanggal');
            $table->string('tahun');
            $table->integer('satuan_hasil');
            $table->double('target_hasil');
            $table->double('realisasi_hasil');
            $table->string('kendala');
            $table->string('mitigasi');
            $table->string('photo_evident');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekaprkms');
    }
};
