<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentStorage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public static function getPlaceImages($ID)
    {
        $images = [];

        $ContentImage = DocumentStorage::where('place_id',$ID)->get();
        if($ContentImage){
            foreach ($ContentImage as $item){
                $images[] = (string) $item->file_path;
            }
        }

        return $images;
    }
}
