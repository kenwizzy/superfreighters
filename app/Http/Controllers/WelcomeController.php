<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\TransportMode;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        return view('welcome',[
            'countries' => Country::all(),
            'modes' => TransportMode::all()
        ]);
    }
}
