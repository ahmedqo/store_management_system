<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->nullable();
            $table->string('slug')->unique();
            $table->string('name_en')->unique();
            $table->string('name_fr')->unique();
            $table->string('name_it')->unique();
            $table->string('name_ar')->unique();
            $table->string('file');
            $table->string('description_en')->nullable();
            $table->string('description_fr')->nullable();
            $table->string('description_it')->nullable();
            $table->string('description_ar')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('categories');
    }
}
