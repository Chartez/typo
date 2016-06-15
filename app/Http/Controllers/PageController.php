<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function explore()
    {
        return view('pages.explore');
    }

    public function create()
    {
        return view('pages.create');
    }
}
