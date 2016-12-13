<?php

use Illuminate\Database\Seeder;

class PickupLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickup_locations')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'pickup_loc_name' => 'North_Shore_Mall',
            'pickup_loc_town' => 'Peabody MA',
        ]);

        DB::table('pickup_locations')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'pickup_loc_name' => 'Boston_Common',
            'pickup_loc_town' => 'Boston MA',
        ]);

        DB::table('pickup_locations')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'pickup_loc_name' => 'South_Shore_ Mall',
            'pickup_loc_town' => 'Braintree MA',
        ]);

    }
}
