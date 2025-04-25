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
        Schema::table('realkpis', function (Blueprint $table) {
            $table->string('bobot_subkpi')->nullable()->after('nama_sub_kpi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('realkpis', function (Blueprint $table) {
            $table->dropColumn('bobot_subkpi');
        });
    }
};
