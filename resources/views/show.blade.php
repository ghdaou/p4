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
            <h1>Following are your booking/s</h1>
            </br></br>
        </div>
        <div>
            <table class="table table-striped table-hover ">

                <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>+</td>
                            <td>{{ $reservation->event }}</td>
                            <td><a href="/excursions/{}/edit" class="btn btn-primary">Edit</a></td>
                            <td><a href="/excursions/{}" class="btn btn-primary">Cancel</a></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
