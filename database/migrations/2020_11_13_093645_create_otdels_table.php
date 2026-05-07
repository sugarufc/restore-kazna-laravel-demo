<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtdelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otdels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('s_name');
            $table->integer('parent_id')->default(0);
            $table->string('slug')->unique();
            $table->integer('sort')->default('500')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otdels');
    }
}
