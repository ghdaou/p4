<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PickupLocationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(PickuplocationReservationTableSeeder::class);
    }
}
