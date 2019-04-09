<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducatorSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producator_subcategory', function (Blueprint $table) {
            $table->unsignedBigInteger('producator_id');
            $table->unsignedBigInteger('subcategory_id');
            
            $table->unique(['producator_id', 'subcategory_id']);
            $table->foreign('producator_id')->references('id')->on('producatori');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producator_subcategory');
    }
}
