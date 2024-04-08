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
            $table->longText('papan_filepath')->nullable();
            $table->longText('kaki_filepath')->nullable();
            $table->longText('papan_originalname')->nullable();
            $table->longText('kaki_originalname')->nullable();
            $table->longText('papan_texture_filepath')->nullable();
            $table->longText('kaki_texture_filepath')->nullable();
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
