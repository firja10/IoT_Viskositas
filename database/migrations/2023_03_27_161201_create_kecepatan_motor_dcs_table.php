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
        Schema::create('kecepatan_motor_dcs', function (Blueprint $table) {
            $table->id();
            $table->string('w_ref');
            $table->string('w');
            $table->string('error_w');
            $table->string('ref_error_w');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecepatan_motor_dcs');
    }
};
