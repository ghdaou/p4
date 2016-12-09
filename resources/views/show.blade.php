@extends('layouts.master')

@section('title')
    STADIUM TRANSPORATION
@endsection

@section('head')

    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="stylesheet" href="/css/show.css">

@endsection


@section('content')

    <div class='welcome-content'>
        <div class='welcome-header'>

            Crowdpowered Travel
            </br>
            BOSTON-GILLETTE STADIUM
            </br></br>
        </div>
        <div >
            <h1>Following are your booking/s</h1>
            </br></br>
        </div>

        <div class='res-show-con'>
            @foreach ($reservations as $reservation)
                <table >
                    <tr "res-tbl">
                        <td>{{ $reservation->event }}</td>
                        <td><a href="/excursions/{}/edit" class="btn btn-primary">Edit</a></td>
                        <td><a href="/excursions/{}" class="btn btn-primary">Cancel</a></td>
                    </tr>
                </table>
                <br>

            @endforeach
        </div>
    </div>


@endsection
