<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    public function up() {

         Schema::create('reservations', function (Blueprint $table) {

             # Increments method will make a Primary, Auto-Incrementing field.
             # Most tables start off this way
             $table->increments('id');

             # This generates two columns: `created_at` and `updated_at` to
             # keep track of changes to a row
             $table->timestamps();

             # The rest of the fields...
             $table->string('first_name');
             $table->string('last_name');
             $table->string('email');
             $table->integer('user_id');             
             $table->integer('num_pass');
             $table->string('pickup_loc');
             $table->string('event');
             $table->string('spe_instr');

         });
     }

     public function down()
    {
        Schema::drop('reservations');
    }

}
