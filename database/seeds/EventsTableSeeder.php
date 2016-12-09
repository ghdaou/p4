<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('events')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'event_name' => 'Patriots vs Ravens',
             'date' => 'December 12, 2016',
             'venue' => 'Gillette Stadium',
             'time' => '8:30 PM',
         ]);

         DB::table('events')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'event_name' => 'Patriots vs Jets',
             'date' => 'December 24, 2016',
             'venue' => 'Gillette Stadium',
             'time' => '1:00 PM',
         ]);
     }
}
