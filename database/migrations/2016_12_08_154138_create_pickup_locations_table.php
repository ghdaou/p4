<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {

          Schema::create('pickup_locations', function (Blueprint $table) {

              # Increments method will make a Primary, Auto-Incrementing field.
              # Most tables start off this way
              $table->increments('id');

              # This generates two columns: `created_at` and `updated_at` to
              # keep track of changes to a row
              $table->timestamps();

              # The rest of the fields...
              $table->string('pickup_loc_name');
              $table->string('pickup_loc_town');             

          });
      }

      public function down()
     {
         Schema::drop('pickup_locations');
     }
}
