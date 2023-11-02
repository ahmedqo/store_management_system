<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
