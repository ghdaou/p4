@extends('layouts.master')

@section('title')
    STADIUM TRANSPORATION
@endsection

@section('head')
    <link rel="stylesheet" href="/css/welcome.css">
@endsection


@section('content')

    <div class="jumbotron">
        <form class="form-horizontal" action="/excursions" method="POST">
          {{ csrf_field() }}
          <fieldset>
            <legend>RESERVING SEAT/S</legend>
            <div class="form-group">
              <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="first_name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="last_name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputNuPerons" class="col-lg-2 control-label">Number of Persons</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputNuPersons" placeholder="Number of Persons Traveling" name="num_pass">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Pickup Location/s</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                      @foreach($pickup_loc_for_checkboxes as $pickup_loc_id => $pickup_loc_name)
                          <input
                            type='checkbox'
                            value='{{ $pickup_loc_id }}'
                            name='pickup_loc_names[]'
                            > {{ $pickup_loc_name }} <br>
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
                         <option value='{{ $event_id }}' name='event_id'>
                             {{$event_name}}
                         </option>
                     @endforeach
                </select>
                <br>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Special Instructions</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="SpInst" name="spe_instr"></textarea>
                <span class="help-block">Let us know of any special instructions we should know about.</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
    </div>


@endsection
