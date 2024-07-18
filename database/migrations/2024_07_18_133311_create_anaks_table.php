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
        Schema::create('anaks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('orang_tuas_id');
            $table->foreign('orang_tuas_id')->references('id')->on('orang_tuas')->cascadeOnDelete();
            $table->string('name');
            $table->enum('gender',['Perempuan', 'Laki-laki']);
            $table->enum('education_sd',['Yes', 'No']);
            $table->enum('education_smp',['Yes', 'No']);
            $table->enum('education_sma',['Yes', 'No']);
            $table->enum('education_s1',['Yes', 'No']);
            $table->enum('education_s2',['Yes', 'No']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
