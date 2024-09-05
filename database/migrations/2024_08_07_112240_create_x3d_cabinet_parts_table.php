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
        Schema::create('x3d_cabinet_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('x3d_cabinet_id')
            ->constrained('x3d_cabinets')
            ->cascadeOnDelete();
            $table->string('part_type')->nullable(); // add1, add2, add3, etc.
            $table->string('file_path')->nullable();
            $table->string('original_name')->nullable();
            $table->string('texture_file_path')->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('x3d_cabinet_parts');
    }
};
