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
        Schema::create('rkmdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rkm_realisasi');
            $table->string('id_pel');
            $table->string('uraian_nama');
            $table->string('kontribusi');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkmdetails');
    }
};
