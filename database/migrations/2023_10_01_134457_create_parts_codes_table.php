<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('code_id');
            $table->integer('quantity')->default(0);
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts_codes');
    }
}
