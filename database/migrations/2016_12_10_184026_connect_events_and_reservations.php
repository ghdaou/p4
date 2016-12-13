<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectEventsAndReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('reservations', function (Blueprint $table) {


             # Add a new INT field called `event_id` that has to be unsigned (i.e. positive)
             $table->integer('event_id')->unsigned();

             # This field `event_id` is a foreign key that connects to the `id` field in the `authors` table
             $table->foreign('event_id')->references('id')->on('events');

         });
     }

     public function down()
     {
         Schema::table('reservations', function (Blueprint $table) {

             # ref: http://laravel.com/docs/migrations#dropping-indexes
             # combine tablename + fk field name + the word "foreign"
             $table->dropForeign('reservation_event_id_foreign');

             $table->dropColumn('event_id');
         });
     }
}
