<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\person;
use App\Models\products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function home(){
        $producttype = DB::table('categories')->get();
        $slider = DB::table('slider')->get();
        $store = DB::table('storedetails')->get();
        $featuredProducts = DB::table('products')
        ->orderBy('id', 'desc') // Order products by ID column in descending order
        ->take(3) // Take the first 3 results
        ->get();

        return view('home',[
            'producttype'=>$producttype,
            'slider'=>$slider,
            'featuredProducts'=> $featuredProducts,
            'store' => $store
        ]);
    }
    public function about(){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        return view('about',[
            'producttype'=>$producttype,
            'store'=> $store
        ]);
    }
    public function blogs(){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        $blog = DB::table('blog')->get();
        return view('blogs',[
            'producttype'=>$producttype,
            'store'=> $store,
            'blog' => $blog
        ]);
    }
    public function single($id){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        $blog = blog::find($id);
        $all_posts = DB::table('blog')->get();
        return view('single',[
            'producttype'=>$producttype,
            'store'=> $store,
            'blog' => $blog,
            'all_posts' => $all_posts
        ]);
    }
    public function contact(){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        return view('contact',[
            'producttype'=>$producttype,
            'store'=> $store
        ]);
    }
    public function products(){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        $allproducts = DB::table('products')->get()->reverse();
        $featuredProducts = DB::table('products')
        ->orderBy('id', 'desc') // Order products by ID column in descending order
        ->take(3) // Take the first 3 results
        ->get();
        return view('products',[
            'producttype'=>$producttype,
            'allproducts'=> $allproducts,
            'featuredProducts'=> $featuredProducts,
            'store'=> $store
            ]);
    }

    public function product($id,Request  $request) { 
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        $featuredProducts = DB::table('products')
        ->orderBy('id', 'desc') // Order products by ID column in descending order
        ->take(3) // Take the first 3 results
        ->get();
        $product = products::find($id);
        $allproducts = DB::table('products')->get();
        $user_name = $request->session()->get('user');
        return view('product_page',[
            'producttype'=>$producttype,
            'featuredProducts'=> $featuredProducts,
            'store'=> $store,
            'allproducts'=> $allproducts,
            'product' => $product,
            'user_name' => $user_name
        ]);
    }
    public function search(Request $request) {
        $allproducts = DB::table('products')->get();
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        $featuredProducts = DB::table('products')
        ->orderBy('id', 'desc') // Order products by ID column in descending order
        ->take(3) // Take the first 3 results
        ->get();
        
        $searchValue = $request->query('search'); // Retrieve search query from request
    
        // Search for products by name in the database
        $searchResults = DB::table('products')->where('productName', 'like', '%' . $searchValue . '%')->get();
      $user_name = $request->session()->get('user');
        return view('search', [
            'producttype' => $producttype,
            'featuredProducts' => $featuredProducts,
            'store' => $store,
            'searchResults' => $searchResults,
            'allproducts' => $allproducts,
            'user_name' => $user_name
        ]);
    }
    public function filter_catg(Request $req) { 
        $category = $req->input('categoryname'); // Retrieve category name from request
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        
        // Query products based on category name
        $filter = DB::table('products')->where('productCategory', 'like', '%' . $category . '%')->get();
        // Fetch featured products (if needed)
    
        
        return view('filter', [
            'producttype' => $producttype,
            'allproducts' => $filter, // Pass filtered products to the view

            'store' => $store
        ]);
    }
    
    public function auth(){
        $producttype = DB::table('categories')->get();
        $store = DB::table('storedetails')->get();
        return view('auth',[
            'producttype'=>$producttype,
            'store'=> $store
        ]);
    }

    public function forgotPassword(Request $request)
    {
        // Retrieve inputs from the request
        $username = $request->input("username");
        $security = $request->input("securityquestion");
        $password = $request->input("password");
    
        // Query the persons table to find the user
        $user = DB::table('person')->where('username', $username)->first();
    
        // Check if user exists and security question matches
        if ($user && $user->securityquestion === $security) {
            // Update the user's password
            DB::table('person')->where('username', $username)->update(['password' => $password]);
    
            return response()->noContent();
        } else {
            return redirect()->back()->with('error', 'Wrong credentials');// Redirect to an error view
        }
    }
    

    public function redirect(){
        $store = DB::table('storedetails')->get();
        $producttype = DB::table('categories')->get();
        return view('redirect',[
            'producttype'=>$producttype,
            'store'=> $store
        ]);
    }
}
