<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class product_slider extends Controller
{
    //
    function the_slider(Request $request){
        $filename = '';
        if ($request->hasFile('slideproductIMG')) {
            $image = $request->file('slideproductIMG'); // Use 'productImage' instead of 'image'
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;
        }
        $slide = new slider();
        $slide->id = $request->id;
        $slide->slideproductName = $request->slideproductName;
        $slide->slideproductDesc = $request->slideproductDesc;
        $slide->slideproductIMG = $filename;
        $slide->save();
        return response()->noContent();
    }

}
