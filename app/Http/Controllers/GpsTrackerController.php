<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusServiceController extends Controller
{
    public function index()
    {
        return  view('displaymap');
    }
}
