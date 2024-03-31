<?php

namespace App\Http\Controllers;

use App\Models\queries;
use Illuminate\Http\Request;

class user_queries extends Controller
{
    //
    function new_queries(Request $request){
        $queries = new queries();
        $queries->fname = $request->fname;
        $queries->lname = $request->lname;
        $queries->address = $request->address;
        $queries->subject = $request->subject;
        $queries->save(); 
        return response()->noContent();
    }
}
