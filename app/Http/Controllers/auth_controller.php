<?php

namespace App\Http\Controllers;

use App\Models\person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class auth_controller extends Controller
{
    //
    function signup(Request $request){
        // Check if the username already exists
        $existinguser = person::where('username', $request -> username)->first();
        if($existinguser){
            // Username already exists, redirect back with error message
            return redirect()->back()->with('error', 'Username already exists.');
        }
        // Create a new person instance
        $person = new person();
        $person->username = $request->username;
        $person->name = $request->name;
        $person->email = $request->email;
        $person->address = $request->address;
        $person->password = $request->password;
        $person->securityquestion = $request->securityquestion;
        $person->save();
        return view('/auth');
    }
    function login(Request $request){
        $existing_username = person::where('username',$request -> username) -> exists();
        $existing_password = person::where('password',$request -> password) -> exists();
        if ($existing_username && $existing_password) {
            $person = person::where('username', $request->username)->first();
            $username = $person -> username;
            $password = $person -> password;
            if($username == "admin" && $password == "admin@tales"){
                $srnum = 1;
                // Retrieve data from the database
                $products = DB::table('products')->get();
                $categories = DB::table('categories')->get();
                $slider = DB::table('slider')->get();
                $users = DB::table('person')->get();
                $storedetails = DB::table('storedetails')->get();
                $producttype = DB::table('categories')->get();
                $subs = DB::table('subscribers')->get();
                $queries = DB::table('queries')->get();
                $store = DB::table('storedetails')->get();
                $order = DB::table('orders')->get();
                // Get the row count
                $products_count = $products->count();
                $categories_count = $categories->count();
                $user_count = $users->count();
                $order_count = $order->count();
                $blog = DB::table('blog')->get();
                // Pass variables to the view using compact()
                return view('admin', [
                    'srnum' => $srnum,
                    'products' => $products,
                    'categories' => $categories,
                    'products_count' => $products_count,
                    'categories_count' => $categories_count,
                    'users' => $users,
                    'user_count' => $user_count,
                    'slider' => $slider,
                    'storedetails' => $storedetails,
                    'producttype'=>$producttype,
                    'subs' => $subs,
                    'queries' => $queries,
                    'store' => $store,
                    'order' => $order,
                    'order_count' => $order_count,
                    'blog' => $blog
                ]);
            }
            else{
                $store = DB::table('storedetails')->get();
                $producttype = DB::table('categories')->get();
                $user = $request->input('username');
                $orders = DB::table('orders')->where('username', $user)->get();
                $request->session()->put('user', $user);
                $user_name = $request->session()->get('user');
                return view('user',[
                    'producttype'=>$producttype,
                    'orders' => $orders,
                    'store'=> $store,
                    'user_name' => $user_name
                ]);
            }
        }
        else{
            return redirect()->back()->with('error', 'Wrong credentials');
        }
    }
}
