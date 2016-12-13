@extends('layouts.master')

@section('title')
    STADIUM TRANSPORATION
@endsection

@section('head')

    <link rel="stylesheet" href="/css/welcome.css">

@endsection


@section('content')

    <div class='welcome-content'>

        <div >
            <h1>Following Are My Booking/s</h1>
            </br></br>
        </div>
        @if(sizeof($reservations) == 0)
            <div class='jumbotron'>
                You have no reservations, you can <a href='/excursions/create'>reserve now</a>.
            </div>
        @else
        <div>
            <table class="table table-striped table-hover ">

                <tbody>
                        @foreach ($reservations as $reservation)
                        <tr class='active'>
                            <td>+</td>
                            <td>{{ $reservation->event->event_name }}</td>
                            <td>{{ $reservation->event->date}}</td>
                            <td>{{ $reservation->event->venue }}</td>
                            <td><a href="/excursions/{{ $reservation->id }}/edit" class="btn btn-primary">Edit</a></td>
                            <td><a href="/excursions/{{ $reservation->id }}/delete" class="btn btn-primary">Cancel</a></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
