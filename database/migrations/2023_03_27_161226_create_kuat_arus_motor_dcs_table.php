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
        Schema::create('kuat_arus_motor_dcs', function (Blueprint $table) {
            $table->id();
            $table->string('i_ref')->nullable();
            $table->string('i');
            $table->string('error_i');
            $table->string('ref_error_i');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuat_arus_motor_dcs');
    }
};
