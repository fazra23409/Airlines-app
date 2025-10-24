<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Flight;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        $user = Auth::user();
        $popularFlights = Flight::inRandomOrder()->take(3)->get();

        
        return view('home', [
            'title' => 'Home',
            'user' => $user,
            'popularFlights' => $popularFlights,
        ]);
    }
}
