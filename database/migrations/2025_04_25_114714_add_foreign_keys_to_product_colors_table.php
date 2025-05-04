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
        Schema::table('product_colors', function (Blueprint $table) {
            $table->foreign(['color_id'])->references(['id'])->on('colors')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_colors', function (Blueprint $table) {
            $table->dropForeign('product_colors_color_id_foreign');
            $table->dropForeign('product_colors_product_id_foreign');
        });
    }
};
