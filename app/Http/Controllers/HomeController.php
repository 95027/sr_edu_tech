<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $curruser = Auth()->user()->id;
        $listings = Listing::where('userid', $curruser)->latest()->get();
        return view('dashboard', compact('listings'));
    }
}
