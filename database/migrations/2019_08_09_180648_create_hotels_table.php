<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedSmallInteger('stars');
            $table->string('address');
            $table->float('price');
            $table->text('description');
            $table->boolean('wifi')->default(false);
            $table->boolean('bar')->default(false);
            $table->boolean('air_conditioner')->default(false);
            $table->boolean('restaurant')->default(false);
            $table->boolean('gym')->default(false);
            $table->boolean('room_service')->default(false);
            $table->boolean('cafe')->default(false);
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
        Schema::dropIfExists('hotels');
    }
}
