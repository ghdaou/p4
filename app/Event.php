<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

#Creating Event Model

class Event extends Model
{

    #Event has many reservations
    public function reservations() {
        return $this->hasMany('App\Reservation');
    }

    #custuom Model method to return all events
    public static function eventsForDropdown() {

        $events = Event::orderBy('event_name', 'ASC')->get();
        $events_for_dropdown = [];
        foreach($events as $event) {
            $events_for_dropdown[$event->id] = $event->event_name;
        }
        return $events_for_dropdown;
    }
}
