<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('frontend.orders.index',compact('orders'));
    }
   
   
   public function show($orderId)
{
    $order = Order::with(['orderItems.product'])
                ->where('user_id', auth()->id())
                ->where('id', $orderId)
                ->firstOrFail();
    
    return view('frontend.orders.view', compact('order'));
}
}
