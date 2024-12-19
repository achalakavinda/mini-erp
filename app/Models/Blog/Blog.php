<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo('App\Models\Blog\Category');
    }

    public function ContentType(){
        return $this->belongsTo('App\Models\Blog\ContentType');
    }

    public function primaryLocationOnMap(){
        return $this->hasOne('App\Models\Blog\BlogLocation');
    }

    public function numberToText()
    {
        $txt = '';
        $number = $this->views?$this->views:0;
        $showDecimal = true;

        if($number<1000){
            $showDecimal = false;
        }
        else if($number<100000){
            $number = $this->views/1000;
            $txt = 'K';
        }else{
            $number = $this->views/100000;
            $txt = 'M';
        }
        $newVal = $showDecimal?number_format($number) . $txt:$number;
        return $newVal;
    }

}
