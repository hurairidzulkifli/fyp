<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Tag;
use App\User;
use Mail;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=\DB::table('posts')->get();
       return view('admin.posts.index',compact('posts')); //return all posts from db
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count()== 0 || $tags->count()==0) //category must be available before doing any post
        {
            Session::flash('info','You must create a category or tag first');
            
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all()); //return all categories and tags from db
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'      
            
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName(); /*symfony function to give name for the file uploaded*/
        $featured->move('uploads/posts/', $featured_new_name);

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=> 'uploads/posts/' . $featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=> str_slug($request->title),
            'user_id'=> Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Mail::to($request->user())->send(new \App\Mail\AdsPublished);
        Session::flash('success','Post is successfully created and will be verified.');

        return redirect()->back();
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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)
                                        ->with('categories',Category::all())
                                        ->with('tags',Tag::all());
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
        $this->validate ($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=> 'required',

        ]);

        $post = Post::find($id);

        if(!empty($request->hasFile('featured')))
        {
            $featured = $request->featured;
            $featured_new_name = time(). $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'upload/posts'. $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        if($request->has('tags')){
            $post->tags()->sync($request->tags);
            } else {
            $post->tags()->detach($request->tags);
            }

        
        Session::flash('success','Post updated successfully.');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','Ads is successfully trashed');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();  //specifiy my own method using query builder for laravel to get specefic results

        return view('admin.posts.trashed')->with('posts',$posts); //get all trashed results
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();  //specifiy my own method using query builder for laravel to get specefic results

        $post->forceDelete();                                   //first method to replace mysql_fetch 

        Session::flash('success','Post deleted permenantly.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        Session::flash('success','Post successfully restored.');

        return redirect()->back();
    }

    //Moderation for approving a post

    public function editStatus($id)
    {
        $post = \DB::table('posts')->where('id', $id)->first();
        return view('admin.posts.editStatus', compact('post', 'id'));
    }

    public function updateStatus (Request $request, $id)
    {
        switch($request->get('approve'))
        {
            case 0:
                Post::postpone($id);
                break;
            case 1:
                Post::approve($id);
                break;
            case 2:
                Post::reject($id);
                break;
            case 3:
                Post::postpone($id);
                break;
            default:    
                break;

        }
        return redirect('admin/posts');
    }

}
