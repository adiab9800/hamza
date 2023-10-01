<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_id');
            $table->string('code');
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_codes');
    }
}
