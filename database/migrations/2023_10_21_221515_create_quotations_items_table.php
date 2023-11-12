<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation');
            $table->unsignedBigInteger('product');
            $table->string("unit");
            $table->integer("quantity");
            $table->float("price", 15, 5);
            $table->string("status");
            $table->timestamps();

            $table->foreign('quotation')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('quotations_items');
    }
}
