<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Header;
use App\Price;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $headers = Header::all();
        $features = Feature::all();
        $prices = Price::all();
        return view('welcome', compact('headers', 'features', 'prices'));
    }
}
