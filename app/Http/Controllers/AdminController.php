<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Country;
use App\Models\TransportMode;
use App\Models\User;

class AdminController extends Controller
{
    public function index (Request $request){
        return view('dashboard.index',[
            'results'=> Order::orderBy('created_at', 'desc')->get(),
            'users' => User::count(),
            'countries' => Country::count(),
            't_mode' => TransportMode::count()
        ]);
    }
}
