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
        Schema::create('viskositas', function (Blueprint $table) {
            $table->id();
            $table->string('vis_ref')->nullable();
            $table->string('vis')->nullable();
            $table->string('error_vis')->nullable();
            $table->string('ref_error_vis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viskositas');
    }
};
