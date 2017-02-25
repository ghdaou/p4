<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GpsTrackerController extends Controller
{
    public function index()
    {
        return  view('displaymap');
    }
}
