<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $guarded = ['id'];

    public function ContentType(){
        return $this->belongsTo('App\Models\Blog\ContentType');
    }

    public function numberToText()
    {
        $txt = '';
        $number = $this->views?$this->views:0;

        if($number<100000){
            $number = $this->views/1000;
            $txt = 'K';
        }else{
            $number = $this->views/100000;
            $txt = 'M';
        }
        $newVal = number_format($number,1) . $txt;
        return $newVal;
    }
}
