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
        Schema::table('kecepatan_motor_dcs', function (Blueprint $table) {
            //

            $table->string('bahan_visko')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kecepatan_motor_dcs', function (Blueprint $table) {
            //

            Schema::dropColumns('bahan_visko');
        });
    }
};
