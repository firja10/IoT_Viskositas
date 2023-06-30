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
        Schema::table('kecepatan_motor_d_c_sesudahs', function (Blueprint $table) {
            //
            $table->string('bahan_visko')->nullable();
            $table->string('delay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kecepatan_motor_d_c_sesudahs', function (Blueprint $table) {
            //
        });
    }
};
