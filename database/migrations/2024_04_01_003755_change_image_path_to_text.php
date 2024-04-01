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
        Schema::table('product_gallery', function (Blueprint $table) {
            $table->text('image_path')->change();
        });
        Schema::table('product_additional_info_product', function (Blueprint $table) {
            $table->text('image_path')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_gallery', function (Blueprint $table) {
            $table->string('image_path')->change();
        });
        Schema::table('product_additional_info_product', function (Blueprint $table) {
            $table->string('image_path')->change();
        });
    }
};
