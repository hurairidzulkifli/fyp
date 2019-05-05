<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Product;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::content()->count()==0)
        {
            Session::flash('info','Your cart is empty');
        }
        return view('checkout'); 
    }

    public function pay()
    {
      
        Stripe::setApiKey("sk_test_C1MHd465DvbDcmgY9RoBFl4I");
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount'=>Cart::total() *100,
            'currency'=>'myr',
            'description'=>'Payment Successful',
            'source'=>request()->stripeToken
        ]);

        Session::flash('success','Purchase successful.Details on purchase will be sent through email.Happy shopping!');
        Cart::destroy();
      

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        return redirect()->route('catalogue');
    }
}
