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
        Schema::create('realkpis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_indikator_kpi');
            $table->double('bobot');
            $table->integer('polaritas');
            $table->string('tahun');
            $table->string('bulan');
            $table->double('target');
            $table->double('realisasi');
            $table->double('pencapaian');
            $table->double('nilai');
            $table->string('status');
            $table->text('penjelasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realkpis');
    }
};
