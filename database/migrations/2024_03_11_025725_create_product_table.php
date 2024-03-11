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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('hard_drive_type_id');
            $table->unsignedBigInteger('hard_drive_size_id');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->json('specifications');
            $table->boolean('enabled');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('ram_id')->references('id')->on('ram_options');
            $table->foreign('hard_drive_type_id')->references('id')->on('hard_drive_types');
            $table->foreign('hard_drive_size_id')->references('id')->on('hard_drive_sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
