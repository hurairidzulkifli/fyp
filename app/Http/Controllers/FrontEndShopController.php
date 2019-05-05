<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontEndShopController extends Controller
{
    public function index()
    {
        return view('catalogue',['products'=>Product::paginate(3)]);
    }

    public function singleProduct($id)
    {
        return view('singleShop',['product'=>Product::find($id)]);
    }


}

