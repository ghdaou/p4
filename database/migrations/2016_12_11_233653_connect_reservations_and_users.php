<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectReservationsAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
       {
           Schema::table('reservations', function (Blueprint $table) {
               # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
               $table->integer('user_id')->unsigned();
               # This field `user_id` is a foreign key that connects to the `id` field in the `authors` table
               $table->foreign('user_id')->references('id')->on('users');
           });
       }
       public function down()
       {
           Schema::table('reservations', function (Blueprint $table) {
               $table->dropForeign('reervations_user_id_foreign');
               $table->dropColumn('user_id');
           });
       }
}
