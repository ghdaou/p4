<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Reservation;
use App\Event;
use App\PickupLocation;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $locations = PickupLocation::get();

        return view('welcome')->with(['events' => $events,
                                     'locations' => $locations]);
    }

    /**
     * Entry to rservation
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRes()
    {
        $events_for_dropdown = Event::eventsForDropdown();
        $pickup_loc_for_checkboxes = PickupLocation::pickuplocationsForCheckboxes();

        # Make sure $authors_for_dropdown is passed to the view
        return view('reserve')->with([
            'events_for_dropdown' => $events_for_dropdown,
            'pickup_loc_for_checkboxes' => $pickup_loc_for_checkboxes
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();
        if($user) {
            $reservations= Reservation::where('user_id', '=', $user->id)->get();
        }
        else {
            $reservations = [];
        }
        return view('show')->with([
            'reservations' => $reservations
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation= Reservation::find($id);

        # Get all the events
        $events_for_dropdown = Event::eventsForDropdown();
        $pickup_loc_for_checkboxes = PickupLocation::pickuplocationsForCheckboxes();

        # Make sure $authors_for_dropdown is passed to the view
        return view('edit')->with([
            'reservation' => $reservation,
            'events_for_dropdown' => $events_for_dropdown,
            'pickup_loc_for_checkboxes' => $pickup_loc_for_checkboxes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # [Validation removed for brevity...]

        # Find and update book
        $reservation = Reservation::find($request->id);
        $reservation ->event_id = $request->event_id;
        $reservation ->first_name = $request->first_name;
        $reservation ->last_name = $request->last_name;
        $reservation ->email = $request->email;
        $reservation ->num_pass = $request->num_pass;
        $reservation ->spe_instr= $request->spe_instr;
        $reservation ->event_id = $request->event_id;
        $reservation ->save();

        # If there were tags selected...
        if($request->tags) {
            $tags = $request->tags;
        }
        # If there were no tags selected (i.e. no tags in the request)
        # default to an empty array of tags
        else {
            $tags = [];
        }

        # Above if/else could be condensed down to this: $tags = ($request->tags) ?: [];

        # Sync tags
        $book->tags()->sync($tags);
        $book->save();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
