<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        return 'This is the contact page';
    }
    public function help()
    {
        return 'This is the help page';
    }
    public function faq()
    {
        return 'This is the faq page';
    }
    public function testimonials()
    {
        return view('testimonials');
    }

}
