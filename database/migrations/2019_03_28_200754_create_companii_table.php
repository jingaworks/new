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
            $table->string('nume', 190);
            $table->unsignedBigInteger('cui')->unique();
            $table->string('judet', 100);
            $table->string('localitate', 100);
            $table->string('adresa', 190)->nullable();
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
