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
        Schema::create('detailrkms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rkm');
            $table->date('tanggal');
            $table->string('bulan');
            $table->string('minggu');
            $table->string('minggu_bulan');
            $table->double('target_harian');
            $table->double('realisasi_harian');
            $table->double('target_hasil_harian');
            $table->double('realisasi_hasil_harian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailrkms');
    }
};
