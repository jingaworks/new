<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nume', 100)->unique();
            $table->string('slug', 100)->unique();
            $table->mediumText('descriere');
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('activated_by')->references('id')->on('users');
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
        Schema::dropIfExists('subcategories');
    }
}
