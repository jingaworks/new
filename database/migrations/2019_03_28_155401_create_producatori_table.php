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
            $table->string('numar');
            $table->string('region', 100);
            $table->string('place', 100);
            $table->year('viza');
            $table->string('phone', 10);
            $table->text('descriere')->nullable();
            $table->unsignedBigInteger('user_id');
            
            $table->boolean('verified')->default(false);
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->boolean('suspended')->default(false);
            $table->text('suspended_reason')->nullable();
            $table->unsignedBigInteger('suspended_by')->nullable();
            
            $table->timestamps();

            $table->unique(['phone']);
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
