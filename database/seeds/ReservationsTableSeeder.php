<?php

use Illuminate\Database\Seeder;
use App\Event;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $event_id = Event::where('event_name','=','Patriots vs Ravens')->pluck('id')->first();

         DB::table('reservations')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'first_name' => 'George',
             'last_name' => 'Daou',
             'email' => 'georgehdaou@yahoo.com',
             'event_id' => $event_id,
             'user_id' => 1,
             'num_pass' => 2,
             'spe_instr' => 'Go Pats',
         ]);

         $event_id = Event::where('event_name','=','Patriots vs Jets')->pluck('id')->first();
         DB::table('reservations')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'first_name' => 'Jeanne',
             'last_name' => 'Maccaroni',
             'email' => 'jeanne@yahoo.com',
             'event_id' => $event_id,
             'user_id' => 1,
             'num_pass' => 2,
             'spe_instr' => 'Go Jets',
         ]);



     }
}
