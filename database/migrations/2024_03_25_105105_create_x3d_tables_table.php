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
        Schema::create('x3d_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->longText('model1_filepath')->nullable();
            $table->longText('model2_filepath')->nullable();
            $table->longText('model3_filepath')->nullable();
            $table->longText('model1_originalname')->nullable();
            $table->longText('model2_originalname')->nullable();
            $table->longText('model3_originalname')->nullable();
            $table->longText('model1_texture_filepath')->nullable();
            $table->longText('model2_texture_filepath')->nullable();
            $table->longText('model3_texture_filepath')->nullable();
            $table->json('price1')->nullable();
            $table->json('price2')->nullable();
            $table->json('price3')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('x3d_tables');
    }
};
