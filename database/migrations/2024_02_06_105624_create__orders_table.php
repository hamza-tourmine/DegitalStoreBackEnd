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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('orderDate');
            $table->decimal('totalAmount');
            $table->enum('paymentStatus',['payed','paying']);
            $table->enum('ShippingStatus',['shipped','shipping']);
            $table->unsignedBigInteger('CustommerId');
            $table->foreign('CustommerId')->references('id')->on('custommers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
