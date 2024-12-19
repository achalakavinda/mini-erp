<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class ResourceCard extends Model
{

    protected $table = 'resource_cards';

    public function ContentType(){
        return $this->belongsTo('App\Models\Blog\ContentType');
    }

    public function Category(){
        return $this->belongsTo('App\Models\Blog\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Blog\Tag');
    }
}
