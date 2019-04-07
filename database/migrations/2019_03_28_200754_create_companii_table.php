<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companii', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 190);
            $table->unsignedBigInteger('cui')->unique();
            $table->string('phone', 10);
            $table->string('region', 100);
            $table->string('place', 100);
            $table->string('address', 190)->nullable();
            $table->unsignedBigInteger('producator_id');
            $table->timestamps();

            $table->foreign('producator_id')->references('id')->on('producatori');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companii');
    }
}
