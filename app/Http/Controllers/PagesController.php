<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title1 = 'Welcome to the';
        $title2 = 'index page';
        return view('pages.index')->with('title1', $title1)->with('title2', $title2);
    }
}
