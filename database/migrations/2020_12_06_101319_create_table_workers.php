<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('special_id')->nullable()->unsigned();
            $table->integer('vts')->nullable();
            $table->integer('gts')->nullable();
            $table->integer('kab')->nullable();
            $table->integer('sort')->default(500)->unsigned();
            $table->string('slug')->nullable()->unique();
            $table->tinyInteger('otdel_id');
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
        Schema::dropIfExists('workers');
    }
}
