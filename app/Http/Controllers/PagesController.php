<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        return view('public.pages.index');
    }

    public function contact()
    {
        return view('public.pages.contact');
    }

    public function about()
    {
        return view('public.pages.about');
    }

}
