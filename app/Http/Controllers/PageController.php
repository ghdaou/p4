<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function commonShow()
    {
        return view('common');
    }
    public function ssmShow()
    {
        return view('ssm');
    }
    public function nsmShow()
    {
        return view('nsm');
    }
    public function testimonials()
    {
        return view('testimonials');
    }

}
