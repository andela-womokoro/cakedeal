<?php

namespace CakeDeal\Http\Controllers;

use Illuminate\Http\Request;

use CakeDeal\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function dashboard()
    {
        return view('app.dashboard');
    }
}
