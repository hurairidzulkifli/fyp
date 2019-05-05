<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','price','image','description','post_id'
    ]; 

    public function posts()
    {
        return $this->belongsTo('App\Post','post_id');  
    }
}
