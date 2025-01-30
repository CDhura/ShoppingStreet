<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index'); 
    }
    
    public function hamburger()
    {
        return view('map.hamburger'); 
    }
    
    public function shuttered1()
    {
        return view('map.shuttered1'); 
    }

    public function butcher()
    {
        return view('map.butcher');
    }
    
}

