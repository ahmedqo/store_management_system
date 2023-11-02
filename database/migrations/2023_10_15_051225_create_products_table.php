<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->nullable();
            $table->unsignedBigInteger('brand')->nullable();
            $table->string('reference')->nullable();
            $table->string('slug')->unique();
            $table->string('name_en')->unique();
            $table->string('name_fr')->unique();
            $table->string('name_it')->unique();
            $table->string('name_ar')->unique();
            $table->string('unit');
            $table->float('price');
            $table->string('status');
            $table->text('details_en');
            $table->text('details_fr');
            $table->text('details_it');
            $table->text('details_ar');
            $table->longText('description_en')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('description_it')->nullable();
            $table->longText('description_ar')->nullable();
            $table->timestamps();

            $table->foreign('brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
