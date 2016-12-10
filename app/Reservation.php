<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function event() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Event');
    }
    /**
	*
	*/
    public function pickuplocations()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\PickupLocation')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    /* End Relationship Methods */
}
