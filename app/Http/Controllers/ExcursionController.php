<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
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
        // // # Validate
        // //  $this->validate($request, [
        // //      'first_name' => 'required',
        // //      'last_name' => 'required',
        // //      'email' => 'required',
        // //      'num_pass' => 'required|min:1',
        // //      'pickup_loc' => 'required',
        // //      'spe_instr' =>'max:24'
        //
        //  ]);
         # If there were errors, Laravel will redirect the
         # user back to the page that submitted this request
         # The validator will tack on the form data to the request
         # so that it's possible (but not required) to pre-fill the
         # form fields with the data the user had entered
         # If there were NO errors, the script will continue...
         # Get the data from the form
         #$title = $_POST['title']; # Option 1) Old way, don't do this.
         #$reservation = $request->input('title'); # Option 2) USE THIS ONE! :)
         $reservation  = new Reservation();
         $reservation ->first_name = $request->input('first_name');
         $reservation ->last_name = $request->input('last_name');
         $reservation ->email= $request->input('email');
         $reservation ->num_pass = $request->input('num_pass');
         $reservation ->event_id = $request->input('event_id');
         $reservation ->user_id = $request->user()->id;
         $reservation ->spe_instr = $request->input('spe_instr');
         $reservation ->save();
         # Save
         $pickup_loc_names= ($request->pickup_loc_names) ?: [];
         $reservation ->pickuplocations()->sync($pickup_loc_names);
         $reservation ->save();
         Session::flash('flash_message', 'Your reservation was added.');
         return redirect('/');
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

        # Get all the Models
        $events_for_dropdown = Event::eventsForDropdown();
        $pickup_loc_for_checkboxes = PickupLocation::pickuplocationsForCheckboxes();


        # Just the pick up locations for this reservation
        $pickup_locations_for_this_reservation = [];
        foreach ($reservation->pickuplocations() as $location) {
            $pickup_locations_for_this_reservation[] = $location->pickup_loc_name;
        }

        # Make sure $authors_for_dropdown is passed to the view
        return view('edit')->with([
            'reservation' => $reservation,
            'events_for_dropdown' => $events_for_dropdown,
            'pickup_loc_for_checkboxes' => $pickup_loc_for_checkboxes,
            'pickup_locations_for_this_reservation' => $pickup_locations_for_this_reservation
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

        # Find and update reservation
        $reservation = Reservation::find($request->id);
        dump ($request);
        $reservation ->first_name = $request->first_name;
        $reservation ->last_name = $request->last_name;
        $reservation ->email = $request->email;
        $reservation ->num_pass = $request->num_pass;
        $reservation ->spe_instr= $request->spe_instr;
        $reservation ->event_id = $request->event_id;

        # If there were tags selected...
        if($request->pickup_loc_names) {
            $pickup_loc_names = $request->pickup_loc_names;
        }
        # If there were no tags selected (i.e. no tags in the request)
        # default to an empty array of tags
        else {
            $pickup_loc_names = [];
        }

        # Above if/else could be condensed down to this: $tags = ($request->tags) ?: [];

        # Sync pickup locations
        $reservation->pickuplocations()->sync($pickup_loc_names);
        $reservation->save();

    }
    /**
    * GET
    * Page to confirm deletion
    */
    public function delete($id) {
        $reservation = Reservation::find($id);
        return view('delete')->with('reservation', $reservation);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Get the book to be deleted
        $reservation = Reservation::find($id);
        if(is_null($reservation)) {
            Session::flash('message','Reservation not found.');
            return redirect('/');
        }
        # First remove any tags associated with this book
        if($reservation->pickuplocations()) {
            $reservation->pickuplocations()->detach();
        }
        # Then delete the book
        $reservation->delete();
        # Finish
        Session::flash('flash_message', $reservation->event->event_name.' was deleted.');
        return redirect('/excursions/show');
    }
}
