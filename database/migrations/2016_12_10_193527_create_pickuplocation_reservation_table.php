<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickuplocationReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('pickup_location_reservation', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             # `reservation_id` and `pickup_location_id` will be foreign keys, so they have to be unsigned
             #  Note how the field names here correspond to the tables they will connect...
             # `reservation_id` will reference the `books table` and `tag_id` will reference the `tags` table.
             $table->integer('reservation_id')->unsigned();
             $table->integer('pickup_location_id')->unsigned();

             # Make foreign keys
             $table->foreign('reservation_id')->references('id')->on('reservations');
             $table->foreign('pickup_location_id')->references('id')->on('pickup_locations');
         });
     }

     public function down()
     {
         Schema::drop('pickup_location_reservation');
     }
}
