<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use Cart;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {

        $pdt = Product::find(request()->pdt_id);
        $cartItem = Cart::add([
            'id'=> $pdt->id,
            'name'=> $pdt->name,
            'qty'=> request()->qty,
            'price'=> $pdt->price

        ]);

        Cart::associate($cartItem->rowId,'App\Product');  //associate cart with Product model to interact with database
        Session::flash('success','Product is added to your cart');
        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        Session::flash('success','Product is removed from your cart');
        return redirect()->back();
    }

    public function incr($id,$qty)
    {
        Cart::update($id,$qty+1 );
        Session::flash('success','Product quatity is updated');
        return redirect()->back();
    }

    public function decr($id,$qty)
    {
        Cart::update($id,$qty-1 );
        Session::flash('success','Product quatity is updated');
        return redirect()->back();
    }

    public function rapidadd($id)
    {
        $pdt = Product::find($id);
        $cartItem = Cart::add([
            'id'=> $pdt->id,
            'name'=> $pdt->name,
            'qty'=> 1,
            'price'=> $pdt->price

        ]);

        Cart::associate($cartItem->rowId,'App\Product');  //associate cart with Product model to interact with database
        Session::flash('success','Product is added to your cart');
        return redirect()->route('cart');
    }
}
