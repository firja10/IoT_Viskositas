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
        Schema::create('tegangan_motor_dcs', function (Blueprint $table) {
            $table->id();
            $table->string('v_ref')->nullable();
            $table->string('v')->nullable();
            $table->string('error_v')->nullable();
            $table->string('ref_error_v')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tegangan_motor_dcs');
    }
};
