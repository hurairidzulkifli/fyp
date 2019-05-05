<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hootlex\Moderation\Moderatable;
use App\Product;

class Post extends Model
{

    use Moderatable;
    use SoftDeletes;

    protected $fillable = [
    
        'title','content','category_id','featured','slug','user_id','status','product_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');  
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
