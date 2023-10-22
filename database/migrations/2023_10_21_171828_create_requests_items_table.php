<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request');
            $table->unsignedBigInteger('product');
            $table->integer("quantity");
            $table->timestamps();

            $table->foreign('request')->references('id')->on('requests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_items');
    }
}
