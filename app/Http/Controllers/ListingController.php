<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function create(){
        return view('listing.create');
        
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'age' => 'required | numeric | max:100 | min:0',
            'email' => 'required | email',
            'dob' => 'required | date | before:today',
            'contact' => 'required | numeric | digits:10',
            'image' => 'required | image | mimes:png, jpg, jpeg | max:2048',
        ]);

        $userid = Auth()->user()->id;
        $name = request('name');
        $age = request('age');
        $email = request('email');
        $dob = request('dob');
        $contact = request('contact');

        // for image
        $image = time(). '.' . request('image')->getClientOriginalExtension();
        request()->image->move(public_path('profile_images'), $image);

        Listing::create([
            'userid' => $userid,
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'dob' => $dob,
            'contact' => $contact,
            'image' => $image,
        ]);

        return redirect()->route('home')->with('message', 'Your listing created successfully...');
    }

    public function edit($id){
        $listing = Listing::find($id);
        return view('listing.edit', compact('listing'));
    }

    public function update(Request $request){
        $id = request('id');
        $listing = Listing::find($id);

        $request->validate([
            'name' => 'required',
            'age' => 'required | numeric | max:100 | min:0',
            'email' => 'required | email',
            'dob' => 'required | date | before:today',
            'contact' => 'required | numeric | digits:10',
            'image' => 'required | image | mimes:png, jpg, jpeg | max:2048',
        ]);

        $name = request('name');
        $age = request('age');
        $email = request('email');
        $dob = request('dob');
        $contact = request('contact');

        // for image
        $image = time(). '.' . request('image')->getClientOriginalExtension();
        request()->image->move(public_path('profile_images'), $image);

        $listing -> update([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'dob' => $dob,
            'contact' => $contact,
            'image' => $image,
        ]);

        return redirect()->route('home')->with('message', 'Your listing updated successfully...');
    }
}
