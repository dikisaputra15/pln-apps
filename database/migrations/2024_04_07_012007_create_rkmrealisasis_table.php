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
            $table->integer('id_rekap_rkm');
            $table->integer('id_rkm');
            $table->string('id_p')->nullable();
            $table->date('tanggal');
            $table->text('alamat');
            $table->integer('daya');
            $table->string('satuan_hasil');
            $table->double('estimasi_hasil');
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
