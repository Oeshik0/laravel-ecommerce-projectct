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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('catagory_id')->index('products_catagory_id_foreign');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default(0)->comment('1=trending,0=Not-trending');
            $table->tinyInteger('status')->default(0)->comment('1=hidden,0=visible');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
