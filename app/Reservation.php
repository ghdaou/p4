<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    # Defining relationship methods
    public function event() {
        # reservation belongs to event
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Event');
    }
    /**
	* resrevation belongs to many pickup locations
	*/
    public function pickuplocations()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\PickupLocation')->withTimestamps();
    }
    #reservation belongs to user
    public function user() {
        return $this->belongsTo('App\User');
    }
    /* End Relationship Methods */
}
