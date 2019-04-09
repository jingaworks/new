<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducatoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producatori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titular', 150);
            $table->char('serie', 2);
            $table->unsignedBigInteger('numar');
            $table->string('region', 100);
            $table->string('place', 100);
            $table->year('viza');
            $table->boolean('verified')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['serie', 'numar']);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producatori');
    }
}
