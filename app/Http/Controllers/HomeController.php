<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Charts;
use DB;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get(); 
        $chart = Charts::database($categories,'bar','highcharts')
        ->title("Club Graph Count")
        ->elementLabel("Total Club Registered") 
        ->dimensions(500,500)
        ->responsive(false)
        ->groupByMonth(date('Y'),true);

        $tags = Tag::where(DB::raw("(DATE_FORMAT(tag,'%Y'))"),date('Y'))->get(); 
        $pie_chart = Charts::database(Tag::all(),'pie','highcharts')
        ->title('Most Active Club')
        ->responsive(false)
        ->groupBy('tag')
        ->labels(['UniKL MIIT','Software Engineering Club','Pencak Silat Society','KRUM']);
        
        
        return view('admin.dashboard')
        ->with('posts_count',Post::all()->count())
        ->with('trash_count', Post::onlyTrashed()->get()->count())
        ->with('categories_count', Category::all()->count())
        ->with('users_count', User::all()->count())
        ->with('chart',$chart)
        ->with('pie_chart',$pie_chart);
    }

    public function faq()
    {
        return view('admin.faq');
    }

    
}
