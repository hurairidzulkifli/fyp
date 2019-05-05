<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//FrontEndRoutes

Route::get('/', [
 'uses'=>'FrontEndController@index',
 'as'=>'index'
]);

Route::get('/fullcalendar',[
    'uses'=>'EventController@index',
    'as'=>'fullcalendar'
]);

Route::get('/catalogue', [
    'uses'=>'FrontEndShopController@index',
    'as'=>'catalogue'
   ]);

   Route::get('/product/{id}',[
       'uses'=>'FrontEndShopController@singleProduct',
       'as'=>'product.single'
   ]);

   Route::post('/cart/add',[
       'uses'=>'ShoppingController@add_to_cart',
       'as'=>'cart.add'
   ]);

   Route::get('/cart',[
       'uses'=>'ShoppingController@cart',
       'as'=>'cart'
   ]);

   Route::get('/cart/delete/{id}',[
       'uses'=>'ShoppingController@cart_delete',
       'as'=>'cart.delete'
   ]);

   Route::get('/cart/incr/{id}/{qty}',[
       'uses'=>'ShoppingController@incr',
       'as'=>'cart.incr'
   ]);
   Route::get('/cart/decr/{id}/{qty}',[
    'uses'=>'ShoppingController@decr',
    'as'=>'cart.decr'
]);

Route::get('/cart/rapidadd/{id}',[
    'uses'=>'ShoppingController@rapidadd',
    'as'=>'rapid.add'
]);

Route::get('/cart/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'cart.checkout'
]); 

Route::post('/cart/checkout',[
    'uses'=>'CheckoutController@pay',
    'as'=>'cart.checkout'
]);


Route::get('/post/{slug}',[
    'uses'=>'FrontEndController@singlePost',
    'as'=>'post.single'
]);

Route::get('/category/{id}',[
    'uses'=>'FrontEndController@category',
    'as'=>'category.single'
]);

Route::get('/tag/{id}',[
    'uses'=>'FrontEndController@tag',
    'as'=>'tag.single'
]);

Route::resource('products','ProductsController');
Route::get('events', 'EventController@index');

Route::get('results',function(){
    $posts =\App\Post::where('title','like', '%'. request('query') . '%')->get();

    return view('results')->with('posts', $posts)
                          ->with('title',"Search Results :" . request('query'))
                          ->with('title', App\Settings::first()->site_name)
                          ->with('categories',App\Category::take(5)->get())
                          ->with('query', request('query'));
});


//AdminPanelRoutes
Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){  //Grouping routes to authenticated person only

    Route::get('/dashboard', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('/faq',[
        'uses'=>'HomeController@faq',
        'as'=>'faq'
    ]);

    Route::get('/post/create',[

        'uses'=>'PostsController@create',
        'as'=>'post.create'
    ]);
    
    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);

    Route::get('/post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);

    Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);

    Route::get('/posts/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);

    Route::get('/post/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);

    Route::get('/post/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
    ]);

    Route::get('/posts/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
     ])->middleware('admin');

    Route::post('/post/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ])->middleware('admin');

    Route::get('/post/editStatus/{id}',[
        'uses'=>'PostsController@editStatus',
        'as'=>'post.editStatus'
        ])->middleware('admin');
   
        Route::post('edit/{id}','PostsController@updateStatus');

    Route::get('/category/create',[
        'uses'=> 'CategoriesController@create',
        'as'=>'category.create'
      
    ]);

    Route::get('/categories',[
        'uses'=> 'CategoriesController@index',
        'as'=>'categories'
    ]);

    Route::post('/category/store',[
        'uses'=> 'CategoriesController@store',
        'as'=>'category.store'
    ]);

    Route::get('/category/edit{id}',[
        'uses'=> 'CategoriesController@edit',
        'as'=>'category.edit'
    ])->middleware('admin');

    Route::get('/category/delete{id}',[
        'uses'=> 'CategoriesController@destroy',
        'as'=>'category.delete'
    ])->middleware('admin');

    Route::post('/category/update{id}',[
        'uses'=> 'CategoriesController@update',
        'as'=>'category.update'
    ])->middleware('admin');

    Route::get('/tags',[
        'uses'=> 'TagsController@index',
        'as'=>'tags'
    ]);

    Route::get('/tags/create',[
        'uses'=> 'TagsController@create',
        'as'=>'tag.create'
    ]);

    Route::post('/tags/store',[
        'uses'=> 'TagsController@store',
        'as'=>'tag.store'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses'=> 'TagsController@edit',
        'as'=>'tag.edit'
    ]);

    Route::post('/tag/update/{id}',[
        'uses'=> 'TagsController@update',
        'as'=>'tag.update'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses'=> 'TagsController@destroy',
        'as'=>'tag.destroy'
    ]);

    Route::get('/users',[
        'uses'=>'UsersController@index',
        'as'=>'users'

    ]);

    Route::get('/user/create',[
        'uses'=>'UsersController@create',
        'as'=>'user.create'
    ]);
    
    Route::post('/user/store',[
        'uses'=>'UsersController@store',
        'as'=>'user.store'
    ]);

    Route::get('/user/delete{id}',[
        'uses'=>'UsersController@destroy',
        'as'=>'user.delete'
    ]);

    Route::get('/settings',[
        'uses'=>'SettingsController@index',
        'as'=>'settings'
    ])->middleware('admin');

    Route::post('/settings/update',[
        'uses'=>'SettingsController@update',
        'as'=>'settings.update'
    ])->middleware('admin');


});


