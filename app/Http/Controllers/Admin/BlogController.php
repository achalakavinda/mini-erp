<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogLocation;
use App\Models\Blog\BlogSeoTag;
use App\Models\Blog\Category;
use App\Models\Blog\ContentType;
use App\Models\Blog\DocumentStorage;
use App\Models\SiteMeta;
use App\Models\SiteMetaSeoTag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    private $imageController;

    public function __construct()
    {
        // $this->imageController = new ImageController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Blogs = Blog::all();

        return view('admin.interfaces.blog.index',compact(['Blogs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_CREATE')]);
        return view('admin.interfaces.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_CREATE')]);

        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'category_id' => 'required',
            'post' => 'required'
        ]);

        $category = Category::findOrFail($request->category_id);
        $category_name = $category->name;
        $category_slug = $category->slug;
        $contentType = ContentType::where('name','blog')->first();

        //creating a blog
        $Blog = Blog::create([
            'user_id'=>Auth::id(),
            'content_type_id'=>$contentType?$contentType->id:1,
            'category_id'=>$request->category_id,
            'category_name'=>$category_name,
            'category_slug'=>$category_slug,
            'title'=>$request->title,
            'slug'=>str::slug($request->title,'-'),
            'post'=>$request->post,
            'summery'=>$request->summary,
            'status'=>'draft',
            'location'=>$request->location!=null? $request->location:$request->google_location_description,
            'google_location_description'=>$request->google_location_description,
            'lat'=>$request->lat,
            'lng'=>$request->lng
        ]);

        //save image storage driver
        if($request->thumbnail_path){
            $this->imageController->addImageToBlog($request,$Blog);
        }

        return redirect('system/blog/'.$Blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_READ')]);
        $Blog = Blog::findOrFail($id);

        $SiteMeta = SiteMeta::where('blog_id',$Blog->id)->first();

        if(!$SiteMeta){
            $SiteMeta = SiteMeta::create([
                'name'=>$Blog->title,
                'blog_id'=>$Blog->id,
                'type'=>'blog',
                'set'=>1
            ]);
        }

        $SiteMetaSeoTags   = SiteMetaSeoTag::orderBy('group','asc')->get();
        $locationDocuments = DocumentStorage::where('blog_id',$Blog->id)->get();


        return view('admin.interfaces.blog.show',compact(['Blog','SiteMeta','SiteMetaSeoTags','locationDocuments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_UPDATE')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //check user permission
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_UPDATE')]);

        //validate request body
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'summery'=>'required',
            'category_id'=>'required',
            'content_type_id'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'post'=>'required'
        ]);

        $Blog = Blog::findorfail($id);

        if($Blog->lat || $Blog->lng )
        {
            $request->validate([
                'lat'=>'required',
                'lng'=>'required',
            ]);
        }

        if($request->category_id && $request->category_id != $Blog->category_id )
        {
            $BlogCategory = Category::find($request->category_id);
            if($BlogCategory){
                $Blog->category_id = $BlogCategory->id;
                $Blog->category_name = $BlogCategory->name;
                $Blog->category_slug = $BlogCategory->slug;
            }
        }

        if($request->content_type_id && $request->content_type_id != $Blog->content_type_id )
        {
            $blogContentType = ContentType::find($request->content_type_id);
            if($blogContentType){
                $Blog->content_type_id = $blogContentType->id;
            }
        }

        if($request->lat && $request->lng )
        {
            $Blog->location = $request->location?$request->location :$request->google_location_description;
            $Blog->google_location_description = $request->google_location_description;
            $Blog->lat = $request->lat;
            $Blog->lng = $request->lng;
        }

        //save image storage driver
        if($request->thumbnail_path){
            $this->imageController->addImageToBlog($request,$Blog);
        }

        $Blog->title = $request->title;
        $Blog->status = $request->status;
        $Blog->summery = $request->summery;

        if(strcmp($Blog->post,$request->post)!== 0){
            $Blog->post = $request->post;
        }

        $Blog->save();

        return Redirect::back();
    }

    public function ckEditorFileStore(Request $request, $id){
        $blog = Blog::findOrFail($id);

        if($request->hasFile('upload')) {
            $slug = $blog->slug;
            $path = $request->file('upload')->store('blog/'.$slug,'s3');
            Storage::disk('s3')->setVisibility($path,'public');
            $url = Storage::disk('s3')->url($path);

            DocumentStorage::create([
                'name'=>$path,
                'file_path'=>$url,
                'blog_id'=>$blog->id,
                'drive'=>'s3'
            ]);

            $CKEditorFuncNum = $request->CKEditorFuncNum;
            $msg = 'Image uploaded successfully to s3 bucket'.$path;
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');

        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_BLOG_DELETE')]);
    }
}
