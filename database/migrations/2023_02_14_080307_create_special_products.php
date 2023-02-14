<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('photo');
            $table->string('color');
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->string('discountoffer')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('brandId');
            $table->foreign('categoryid')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brandId')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_products');
    }
};
