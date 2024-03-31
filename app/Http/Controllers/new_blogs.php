<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class new_blogs extends Controller
{
    function add_blog(Request $request){
        $filename = '';
        if ($request->hasFile('blogimg')) {
            $image = $request->file('blogimg'); // Use 'productImage' instead of 'image'
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;
        }
        $slide = new blog();
        $slide->blogtitle = $request->blogtitle;
        $slide->id = $request->blogtitle;
        $slide->blogcontent = $request->blogcontent;
        $slide->blogimg = $filename;
        $slide->save();
        return response()->noContent();
    }
}
