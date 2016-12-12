@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $reservation->event->event_name }}
@endsection

@section('content')

    <h1>Confirm deletion</h1>
    <form method='POST' action='/excursions/{{ $reservation->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h2>Are you sure you want to delete this reservation?</h2>

        <input type='submit' value='CANCEL' class="btn btn-primary>

    </form>

@endsection
