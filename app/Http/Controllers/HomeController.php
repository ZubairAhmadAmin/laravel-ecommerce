<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else
        {
            $count = '';
        }
        return view('home.index')
            ->with('products', Product::all())
            ->with('count', $count);
    }

    public function login_home()
    {
        if (Auth::id()) 
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }
        else
        {
            $count = '';
        }
        return view('home.index')
            ->with('products', Product::all())
            ->with('count', $count);
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();
        }
        return view('home.mycart')
                    ->with('count', $count)
                    ->with('carts', $cart);
    }

  public function confirm_order(Request $request)
{
    $name = $request->name;   
    $address = $request->address;   
    $phone = $request->phone;  
    $user_id = Auth::id();

    $carts = Cart::where('user_id', $user_id)->get();

    foreach ($carts as $cart) {
        $order = new Order();
        $order->name = $name;
        $order->address = $address;
        $order->phone = $phone;
        $order->user_id = $user_id;
        $order->product_id = $cart->product_id;
        $order->save();

        $cart->delete(); // حذف مستقیم همان سبد
    }

    toastr()->timeOut(3000)->success('Cart added to order!');
    return redirect()->back();
}

}
