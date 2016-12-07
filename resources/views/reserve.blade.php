@extends('layouts.master')

@section('title')
    STADIUM TRANSPORATION
@endsection

@section('head')
    <link rel="stylesheet" href="/css/welcome.css">
@endsection


@section('content')

    <div class="jumbotron">
        <form class="form-horizontal">
          <fieldset>
            <legend>RESERVING SEAT/S</legend>
            <div class="form-group">
              <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputNuPerons" class="col-lg-2 control-label">Number of Persons</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputNuPersons" placeholder="Numbers of Persons Traveling">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Pickup Location/s</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                    <input type="checkbox" name="optionsCheckboxes" id="NSM" value="1" checked="">
                    North Shore Mall
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="checkbox" name="optionsCheckboxes" id="BC" value="2">
                    Boston Common
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="checkbox" name="optionsCheckboxes" id="SSM" value="3">
                    South Shore Mall
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="select" class="col-lg-2 control-label">Event</label>
              <div class="col-lg-10">
                <select class="form-control" id="select">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <br>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Special Instructions</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="SpInst"></textarea>
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
