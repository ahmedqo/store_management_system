<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product')->nullable();
            $table->string('remote');
            $table->integer('count')->default(1);
            $table->timestamps();

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
        Schema::dropIfExists('products_views');
    }
}
