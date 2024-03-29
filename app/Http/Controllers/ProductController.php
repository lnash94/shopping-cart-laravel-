<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop/index',['products'=>$products]);
    }
    public function getAddTocart(Request $request , $id){
        $product = Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);
        //($request->session()->get('cart'));
        return redirect()->route('product.index');

    }
    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public  function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldcart =Session::get('cart');
        $cart = new  Cart($oldcart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);

    }

    public  function postCheckout(Request $request){
        if (!Session::has('cart')){
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_ezxTdneh3UPsKUUcRtoSJoZq');

        try{
            $charge=Charge::create(array(
                "amount" => $cart->totalPrice*100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "test charge"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

             Auth::user()->orders()->save($order);

        }catch (\Exception $e){

            return redirect()->route('checkout')->with('error',$e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success','Successfully purchased your products!');



    }
}
