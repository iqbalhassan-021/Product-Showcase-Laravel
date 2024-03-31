<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class new_orders extends Controller
{
    function place_order(Request $request){
        $order = new order();
        $order->productName = $request->productName;
        $order->productId = $request->productId;
        $order->productDescription = $request->productDescription;
        $order->buyername = $request->buyername;
        $order->username = $request->username;
        $order->productPrice = $request->productPrice;
        $order->productSize = $request->productSize;
        $order->quantity = $request->quantity;
        $order->totalPrice	 = $request->totalPrice	;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->save();
        return response()->noContent();
    }
}
