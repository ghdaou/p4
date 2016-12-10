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
}
