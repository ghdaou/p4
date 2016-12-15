<?php

use Illuminate\Database\Seeder;
use App\Reservation;
use App\PickupLocation;

class PickuplocationReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         # First, create an array of all the books we want to associate tags with
         # The *key* will be the book title, and the *value* will be an array of tags.
         $reservations =[
             '1' => ['North_Shore_Mall','South_Shore_ Mall'],
             '2' => ['North_Shore_Mall','Boston_Common'],
         ];

         # Now loop through the above array, creating a new pivot for each book to tag
         foreach($reservations as $res_id => $pickuplocations) {

             # First get the reservation
             $reservation = Reservation::where('id','like',$res_id)->first();

             # Now loop through each tag for this book, adding the pivot
             foreach($pickuplocations as $pickuplocationName) {
                 $pickuplocation = PickupLocation::where('pickup_loc_name','LIKE',$pickuplocationName)->first();

                 # Connect this tag to this book
                 $reservation->pickuplocations()->save($pickuplocation);
             }

         }
     }
}
