@extends('layouts.master')

@section('title')
    Edit Reservation
@endsection

@section('head')
    <link rel="stylesheet" href="/css/welcome.css">
@endsection


@section('content')

    <div class="jumbotron">

        <h3>Editing your {{ $reservation->event->event_name }} Reservation </h3>
        <br>
        <form class="form-horizontal" method='POST' action="/excursions/{{ $reservation->id }}" >
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <input name='id' value='{{$reservation->id}}' type='hidden'>
          <fieldset>
            <div class="form-group">
              <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputFirstName" value='{{ old('first_name', $reservation->first_name)  }}' name="first_name">
              </div>
            <div class='error'>{{ $errors->first('first name') }}</div>
            </div>
            <div class="form-group">
              <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputLastName" value='{{ old('last_name', $reservation->last_name) }}' name="last_name">
              </div>
              <div class='error'>{{ $errors->first('last name') }}</div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" value='{{ old('email', $reservation->email) }}' name="email">
              </div>
            </div>
            <div class='error'>{{ $errors->first('email') }}</div>
            <div class="form-group">
              <label for="inputNuPerons" class="col-lg-2 control-label">Number of Persons</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputNuPersons" value='{{ old('num_pass', $reservation->num_pass) }}' name="num_pass">
              </div>
            </div>
            <div class='error'>{{ $errors->first('number of passengers') }}</div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Pickup Location/s</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                      @foreach($pickup_loc_for_checkboxes as $pickup_loc_id => $pickup_loc_name)
                         <input
                          type='checkbox'
                          value='{{ $pickup_loc_id }}'
                          {{ (in_array($pickup_loc_name, $pickup_locations_for_this_reservation)) ? 'CHECKED' : '' }}
                          name='pickup_loc_names[]'
                          >
                          {{ $pickup_loc_name }}
                        </input>
                         <br>
                      @endforeach
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="event_id" class="col-lg-2 control-label">Event</label>
              <div class="col-lg-10">
                <select class="form-control" id="event_id" name='event_id'>
                    @foreach($events_for_dropdown as $event_id => $event_name)
                        <option
                            value='{{ old('event', $reservation->event_id) }}'
                            {{ ($event_id == $reservation->event->id) ? 'SELECTED' : '' }}
                        >{{$event_name}}</option>
                     @endforeach
                </select>
                <br>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Special Instructions</label>
              <div class="col-lg-10">
                <textarea
                class="form-control"
                rows="3"
                id="SpInst"
                name="spe_instr"
                value='{{ old('spe_instr', $reservation->spe_instr) }}'
                >
                {{ old('event', $reservation->spe_instr) }}
                </textarea>
                <span class="help-block">Let us know of any special instructions we should know about.</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-default">Save Changes</button>
              </div>
            </div>
          </fieldset>
          <div class='error'>
              @if(count($errors) > 0)
              Please correct the errors above and try again.
              @endif
          </div>
        </form>
    </div>

@endsection
