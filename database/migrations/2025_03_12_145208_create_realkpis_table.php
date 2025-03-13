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
            $table->integer('id_unit_induk');
            $table->integer('id_pelaksana');
            $table->integer('id_layanan');
            $table->unsignedBigInteger('id_indikator_kpi');
            $table->string('bulan');
            $table->double('target');
            $table->double('realisasi');
            $table->double('pencapaian');
            $table->double('nilai');
            $table->string('status')->nullable();
            $table->text('penjelasan')->nullable();
            $table->timestamps();

            $table->foreign('id_indikator_kpi')->references('id')->on('kpis')->onDelete('cascade');
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
