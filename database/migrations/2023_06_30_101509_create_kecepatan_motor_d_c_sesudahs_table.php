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
        Schema::create('kecepatan_motor_d_c_sesudahs', function (Blueprint $table) {
            $table->id();
            $table->string('w_ref_sud');
            $table->string('w_sud');
            $table->string('error_w_sud');
            $table->string('ref_error_w_sud');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecepatan_motor_d_c_sesudahs');
    }
};
