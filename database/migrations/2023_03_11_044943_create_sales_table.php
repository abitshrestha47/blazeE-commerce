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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('orderid');
            $table->unsignedBigInteger('deliverytrackid');
            $table->decimal('subtotal');
            $table->string('total');
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('orderid')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('deliverytrackid')->references('id')->on('delivery_trackings')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
};
