<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    protected $table = 'content_types';
    protected $guarded = ['id'];

    public function Blogs(){
        return $this->hasMany('App\Models\Blog\Blog');
    }
}
