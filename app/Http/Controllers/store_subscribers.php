<?php

namespace App\Http\Controllers;

use App\Models\subscribers;
use Illuminate\Http\Request;

class store_subscribers extends Controller
{
    //
    function new_subscriber(Request $request){
        // Check if the username already exists
        $existinguser = subscribers::where('email', $request -> email)->first();
        if($existinguser){
            // Username already exists, redirect back with error message
            return redirect()->back()->with('error', 'email already exists.');
        }
        // Create a new person instance
        $subscriber = new subscribers();
        $subscriber->email = $request->email;
        $subscriber->save(); 

        return response()->noContent();
    }
}
