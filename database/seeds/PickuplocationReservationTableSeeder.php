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
             'Patriots vs Ravens' => ['North Shore Mall','South Shore Mall'],
             'Patriots vs Jets' => ['North Shore Mall','Boston Common'],
         ];

         # Now loop through the above array, creating a new pivot for each book to tag
         foreach($reservations as $event => $pickuplocations) {

             # First get the reservation
             $reservation = Reservation::where('event','like',$event)->first();

             # Now loop through each tag for this book, adding the pivot
             foreach($pickuplocations as $pickuplocationName) {
                 $pickuplocation = PickupLocation::where('pickup_loc_name','LIKE',$pickuplocationName)->first();

                 # Connect this tag to this book
                 $reservation->pickuplocations()->save($pickuplocation);
             }

         }
     }
}
