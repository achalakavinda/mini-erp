<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMetaTag extends Model
{
    protected $fillable = ['site_meta_id','site_meta_seo_tag_id','content','created_at','updated_at'];
}
