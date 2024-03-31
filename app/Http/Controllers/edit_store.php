<?php

namespace App\Http\Controllers;

use App\Models\storedetails;
use Illuminate\Http\Request;

class edit_store extends Controller
{
    //
    function  store_details(Request $request){
        $store = new storedetails();
        $store->storeName = $request->storeName;
        $store->facebookLink = $request->facebookLink;
        $store->instagramLink = $request->instagramLink;
        $store->whatsappLink = $request->whatsappLink;
        $store->linkedinLink = $request->linkedinLink;
        $store->storeAddress = $request->storeAddress;
        $store->storePhone = $request->storePhone;
        $store->storeEmail = $request->storeEmail;
        $store->save();
        return response()->noContent();
    }
}
