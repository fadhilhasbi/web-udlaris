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
        Schema::create('x3d_raks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->longText('rak_filepath')->nullable();
            $table->longText('laci_filepath')->nullable();
            $table->longText('add1_filepath')->nullable();
            $table->longText('rak_originalname')->nullable();
            $table->longText('laci_originalname')->nullable();
            $table->longText('add1_originalname')->nullable();
            $table->longText('rak_texture_filepath')->nullable();
            $table->longText('laci_texture_filepath')->nullable();
            $table->longText('add1_texture_filepath')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('x3d_raks');
    }
};