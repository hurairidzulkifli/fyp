<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use Session;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        if ($posts->count()== 0) //category must be available before doing any post
        {
            Session::flash('info','You must get an approval first');
            
            return redirect()->back();
        }
        return view('products.create')->with('posts',$posts);
    }

    /**
     * Store a newly created resource in storage.eee
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'post_id'=>'required',
            'image'=>'required|image'
        ]);

        $product = new Product;

        $product_image = $request->image;
        $product_image_new_name = time(). $product_image->getClientOriginalName();
        $product_image->move('uploads/products/', $product_image_new_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->post_id = $request->post_id;
        $product->image = 'uploads/products/' .$product_image_new_name;

        $product->save();

        Session::flash('success','Product created');
        return redirect()->route('products.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
       
        return view('products.edit')
                            ->with('products',$products)
                            ->with('posts',Post::all());
                            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'post_id'=>'required',
            'image'=>'required|image'
        ]);

        $product = Product::find($id);

        if(!empty($request->hasFile('image')))
        {
            $product_image = $request->image;
            $product_image_new_name = time(). $product_image->getClientOriginalName();
            $product_image->move('uploads/products', $product_image_new_name);
            $product->image = 'uploads/products' . $product_image_new_name;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->post_id = $request->post_id;
        $product->price = $request->price;

        $product->save();

        Session::flash('success','Product details updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('success','Product deleted');
        return redirect()->back();
    }
}
