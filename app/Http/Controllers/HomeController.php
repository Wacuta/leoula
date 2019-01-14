<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Home page de LeouLa
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
    	return view('home');
    }

    public function voteMot($mot) {
    	return view('home', ['mot' => $mot]);
    }


    //
}
