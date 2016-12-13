@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $reservation->event->event_name }}
@endsection

@section('head')
    <link rel="stylesheet" href="/css/reserve.css">
@endsection

@section('content')

    <div class="res-con">
        <h1>Confirm Reservation Cancelation</h1>
        <form method='POST' action='/excursions/{{ $reservation->id }}'>

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <h2>Are you sure you want to cancel this reservation?</h2>
            <input type='submit' value='CANCEL MY RESERVATION' class="btn btn-primary>
        </form>
    </div>

@endsection
