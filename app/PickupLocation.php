<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    /* Relationship Methods */
    /**
	*
	*/
    public function reservations() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Reservation');
    }
    /* End Relationship Methods */

    public static function pickuplocationsForCheckboxes() {

        $pickuplocations = PickupLocation::get();
        $pickuplocations_for_checkboxes = [];
        foreach($pickuplocations as $pickuplocation) {
            $pickuplocations_for_checkboxes[$pickuplocation->id] = $pickuplocation->pickup_loc_name;
        }

        return $pickuplocations_for_checkboxes;
    }
}
