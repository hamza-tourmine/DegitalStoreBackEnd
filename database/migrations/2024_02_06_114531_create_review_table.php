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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->string('reviewText');
            $table->date('reviewDate');
            $table->integer('rating');
            $table->unsignedBigInteger('productsId');
            $table->unsignedBigInteger('custommerId');
            $table->foreign('productsId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('custommerId')->references('id')->on('custommers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
};
