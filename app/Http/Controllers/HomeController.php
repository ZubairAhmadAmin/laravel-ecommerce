<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.layouts.app')
            ->with('users', User::where('usertype', 'user')->get()->count())
            ->with('products', Product::all()->count())
            ->with('orders', Order::all()->count())
            ->with('delivered_orders', Order::where('status', 'Delivered')->count());
    }

    public function home()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.index')
            ->with('products', Product::all())
            ->with('count', $count);
    }

    public function login_home()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.index')
            ->with('products', Product::all())
            ->with('count', $count);
    }

    public function contact_us()
    {
        $user = Auth::user()->id;
        $user_id = $user;
        $count = Cart::where('user_id', $user_id)->count();
        
        return view('home.contact')
                    ->with('count', $count);
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();
        }
        return view('home.mycart')
            ->with('count', $count)
            ->with('carts', $cart);
    }

    public function remove_cart_product($id)
    {
        $cart_product = Cart::findOrfail($id);
        $cart_product->delete();

        return redirect()->back();
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

            $cart->delete();
        }

        toastr()->timeOut(3000)->success('Product Ordered Successfully!');
        return redirect()->back();
    }

    public function my_orders()
    {
        $user = Auth::user()->id;

        return view('home.myorder')
            ->with('count', Cart::where('user_id', $user)->get()->count())
            ->with('myorders', Order::where('user_id', $user)->get());
    }

    public function stripe($value): View
    {
        return view('home.stripe')
                    ->with('value', $value);
    }

    public function stripePost(Request $request, $value): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $user_id = Auth::id();

        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'paid';
            $order->save();

            $cart->delete();
        }
                
        return redirect()->route('mycart')
                ->with('success', 'Payment successful!');
    }
}
