<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('reservations')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'first_name' => 'George',
             'last_name' => 'Daou',
             'email' => 'georgehdaou@yahoo.com',
             'num_pass' => 2,
             'pickup_loc' => 'North Shore Mall',
             'event' => 'Patriots vs Ravens',
             'spe_instr' => 'Go Pats',
         ]);

         DB::table('reservations')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'first_name' => 'Jeanne',
             'last_name' => 'Maccaroni',
             'email' => 'jeanne@yahoo.com',
             'num_pass' => 2,
             'pickup_loc' => 'South Shore Shore Mall',
             'event' => 'Patriots vs Ravens',
             'spe_instr' => 'Go Ravens',            
         ]);

     }
}
