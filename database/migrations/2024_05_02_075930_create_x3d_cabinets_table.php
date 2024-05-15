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
        Schema::create('x3d_cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->longText('add1_filepath')->nullable();
            $table->longText('add2_filepath')->nullable();
            $table->longText('add3_filepath')->nullable();
            $table->longText('add4_filepath')->nullable();
            $table->longText('add1_originalname')->nullable();
            $table->longText('add2_originalname')->nullable();
            $table->longText('add3_originalname')->nullable();
            $table->longText('add4_originalname')->nullable();
            $table->longText('add1_texture_filepath')->nullable();
            $table->longText('add2_texture_filepath')->nullable();
            $table->longText('add3_texture_filepath')->nullable();
            $table->longText('add4_texture_filepath')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('x3d_cabinets');
    }
};