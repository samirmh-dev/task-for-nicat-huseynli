<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_room_id')->unsigned();;
            $table->date('departure_date');
            $table->date('return_date');
            $table->timestamps();
            $table->foreign('hotel_room_id')
                ->references('id')
                ->on('hotel_rooms')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_room_books');
    }
}
