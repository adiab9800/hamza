<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('week_plan_id');
            $table->unsignedBigInteger('code_id');
            $table->string('day');
            $table->string('shift');
            $table->string('quantity')->default(0);
            $table->timestamps();
            $table->foreign('week_plan_id')
                ->references('id')->on('week_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('code_id')
                ->references('id')->on('codes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_codes');
    }
}
