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
            $table->integer('id_kategori');
            $table->integer('id_aspirasi');
            $table->integer('id_indikator');
            $table->integer('id_satuan');
            $table->integer('bobot');
            $table->integer('polaritas');
            $table->string('nama_indikator_rkm');
            $table->integer('polaritas_rkm');
            $table->string('satuan_rkm');
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
