<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogLocation extends Model
{
    protected $guarded = ['id'];

    public function primaryBlog(){
        return $this->belongsTo('App\Models\Blog\Blog');
    }
}
