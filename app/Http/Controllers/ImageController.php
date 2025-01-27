<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\DocumentStorage;
use App\Models\Blog\ResourceCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public function addImageToResource(Request $request, $ResourceCard){
        $document = [];

        if($request->thumbnail_path){

            $slug = str::slug($ResourceCard->title,'-');
            $path = $request->file('thumbnail_path')->store('resources/'.$slug,'s3');
            Storage::disk('s3')->setVisibility($path,'public');
            $url = Storage::disk('s3')->url($path);

            $ResourceCard->thumbnail = $url;
            $ResourceCard->save();

            return DocumentStorage::create([
                'name'=>$path,
                'file_path'=>$url,
                'resource_id'=>$ResourceCard->id,
                'drive'=>'s3'
            ]);
        }

        return $document;
    }

    public function addImageToBlog(Request $request, $blog){
        $document = [];

        if($request->thumbnail_path){

            $slug = $blog->slug;
            $path = $request->file('thumbnail_path')->store('blog/'.$slug,'s3');
            Storage::disk('s3')->setVisibility($path,'public');
            $url = Storage::disk('s3')->url($path);

            $blog->thumbnail = $url;
            $blog->save();

            return DocumentStorage::create([
                'name'=>$path,
                'file_path'=>$url,
                'blog_id'=>$blog->id,
                'drive'=>'s3'
            ]);
        }

        return $document;
    }

    public function addImageToPlace(Request $request, $place) {
        $document = [];

        if($request->thumbnail_path) {

            $slug = $place->slug;
            $path = $request->file('thumbnail_path')->store('place/'.$slug,'s3');
            Storage::disk('s3')->setVisibility($path,'public');
            $url = Storage::disk('s3')->url($path);

            $place->thumbnail = $url;
            $place->save();

            return DocumentStorage::create([
                'name'=>$path,
                'file_path'=>$url,
                'place_id'=>$place->id,
                'drive'=>'s3'
            ]);
        }

        return $document;
    }

    public function searchFile($name){

    }

    public function getAllFiles(){
        $files =  Storage::disk('s3')->allFiles();
        $fileList = [];
        foreach ($files as $file){
            $ds = DocumentStorage::where('name',$file)->get();

            if($ds->isEmpty())
            {
                array_push($fileList,[
                    'aws_file'=>$file,
                    'document_storage'=>$ds
                ]);
            }
        }
        return $fileList;
    }
}
