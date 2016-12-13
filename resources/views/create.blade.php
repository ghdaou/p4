@extends('layouts.master')

@section('title')
    STADIUM TRANSPORATION
@endsection

@section('head')
    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="stylesheet" href="/css/reserve.css">
@endsection


@section('content')

    <div class='jumbotron'>
        <div class="res-con">
            Reserving and paying for seat/s on our coach bus is easy and convenient.
            All major credit cards and Paypal are accepted.
            <br><br>
            Group Discounts for 5 or more
            <br><br>
            For party larger then 2, multiple pickup locations are available

            <br><br><br>

            <a href="/excursions/create/form" class="btn btn-primary">Let's Reserve</a>
        </div>
    </div>

@endsection
