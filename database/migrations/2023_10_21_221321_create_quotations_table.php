<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('reference');
            $table->float('charge', 15, 5);
            $table->string('currency');
            $table->string('note_en')->nullable();
            $table->string('note_fr')->nullable();
            $table->string('note_it')->nullable();
            $table->string('note_ar')->nullable();
            $table->timestamps();

            $table->foreign('request')->references('id')->on('requests')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
