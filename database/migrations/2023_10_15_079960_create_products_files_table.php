<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product');
            $table->string('name');
            $table->string('type');
            $table->float('size', 15, 5);
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
        Schema::dropIfExists('products_files');
    }
}
