<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogLocation;
use App\Models\Blog\Category;
use App\Models\Blog\ContentImage;
use App\Models\Blog\ContentType;
use App\Models\Blog\DocumentStorage;
use App\Models\Blog\Place;
use App\Models\Blog\PlaceContactTabInfo;
use App\Models\Blog\PlaceContactTabInfoAddress;
use App\Models\Blog\PlaceContactTabInfoSocialMediaLink;
use App\Models\Blog\PlaceFacility;
use App\Models\Blog\PlaceFacilityType;
use App\Models\Blog\PlaceInfoCard;
use App\Models\Blog\PlaceLocation;
use App\Models\SiteMeta;
use App\Models\SiteMetaSeoTag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    private $imageController;

    public function __construct()
    {
        $this->imageController = new ImageController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Places = [];
        if( User::CheckRole(config('aclConstants.Roles.ROLE_SUPER_ADMIN')) )
            $Places = Place::all();
        else
            $Places = Place::where('user_id',auth()->id())->get();

        return view('admin.interfaces.place.index',compact('Places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_CREATE')]);
        $Places = Place::all();
        return view('admin.interfaces.place.create',compact('Places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_CREATE')]);

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content_type_id'=>'required',
            'summary'=>'required'
        ]);

        $category = Category::findOrFail( $request->category_id );
        $contentType = ContentType::findOrFail( $request->content_type_id );
        $category_name = $category->name;
        $category_slug = $category->slug;

        $Place = Place::create([
            'user_id'=>Auth::id(),
            'member_id'=>null,
            'content_type_id'=>$contentType->id,
            'category_id'=>$category->id,
            'category_name'=>$category_name,
            'category_slug'=>$category_slug,
            'slug'=>str::slug($request->title,'-'),
            'title'=>$request->title,
            'summary'=>$request->summary,
            'description'=>$request->description,
            'post'=>$request->post,
            'content'=>$request->content,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'booking_url'=>$request->booking_url,
            'booking_min_price'=>$request->booking_min_price,
            'booking_rating'=>$request->booking_rating,
            'website_url'=>$request->website_url,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'instagram_url'=>$request->instagram_url,
            'pinterest_url'=>$request->pinterest_url,
            'location'=>$request->location,
            'google_location_description'=>$request->google_location_description,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'show'=>true,
            'publish'=>true,
        ]);

        //save image storage driver
        if($request->thumbnail_path) {
            $this->imageController->addImageToPlace($request,$Place);
        }


        return redirect('system/place');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_READ')]);
        $Place = Place::findOrFail($id);
        $Category = Category::where('access_to_place',1)->get()->pluck('name','id');
        $ContentTypes = ContentType::where('access_to_place',1)->pluck('name','id');
        $SiteMeta = SiteMeta::where('place_id',$Place->id)->first();
        if(!$SiteMeta){
            $SiteMeta = SiteMeta::create([
                'name'=>$Place->title,
                'place_id'=>$Place->id,
                'type'=>'place',
                'set'=>1
            ]);
        }
        $SiteMetaSeoTags   = SiteMetaSeoTag::orderBy('group','asc')->get();

        return view('admin.interfaces.place.show',compact(['Place','Category','ContentTypes','SiteMeta','SiteMetaSeoTags']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_UPDATE')]);
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
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_UPDATE')]);

        $request->validate([
            'title'=>'required',
            'type'=>'required'
        ]);

        $Place = Place::findOrFail($id);
        $ContentType = ContentType::findOrFail($request->content_type_id);
        $CategoryType = Category::findOrFail($request->category_id);



        if($request->lat && $request->lng )
        {
            $Place->location = $request->google_location_description;
            $Place->google_location_description=$request->google_location_description;
            $Place->lat=$request->lat;
            $Place->lng=$request->lng;
        }

        $Place->content_type_id = $ContentType->id;
        $Place->category_id = $CategoryType->id;
        $Place->category_name = $CategoryType->name;
        $Place->category_slug = $CategoryType->slug;

        $Place->summary = $request->summary;
        $Place->post = $request->post;
        $Place->status = $request->status;
        $Place->type = $request->type;
        $Place->save();

        //save image storage driver
        if($request->thumbnail_path){
            $this->imageController->addImageToPlace($request,$Place);
        }

        return Redirect::back();
    }

    public function ckEditorFileStore(Request $request, $id){
        $place = Place::findOrFail($id);

        if($request->hasFile('upload')) {
            $slug = $place->slug;
            $path = $request->file('upload')->store('place/'.$slug,'s3');
            Storage::disk('s3')->setVisibility($path,'public');
            $url = Storage::disk('s3')->url($path);

            DocumentStorage::create([
                'name'=>$path,
                'file_path'=>$url,
                'place_id'=>$place->id,
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
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_DELETE')]);
    }


    /**
     * This Method handles the place info card logic,
     * 1. to enable place info card need to create a record in place_info_card table.
     * 2. PlaceContactTabInfo - store link to website
     * 3. PlaceContactTabInfoAddress - store the place address. stored in a table to have multiple address
     * 4. PlaceContactTabInfoSocialMediaLinks - store social media link to place.
    */

    public function infoCard(Request $request){
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_UPDATE')]);
        $request->validate([
            'placeId'=>'required'
        ]);

        $Place = Place::where('id',$request->placeId)->first();

        if($Place){
            $placeId = $Place->id;
            $PlaceInfoCard = \App\Models\Blog\PlaceInfoCard::where('place_id',$Place->id)->first();
            if(!$PlaceInfoCard){
                $PlaceInfoCard = PlaceInfoCard::create([
                    'place_id'=> $placeId,
                    'description'=> $request->description
                ]);
            }

            $PlaceContactTabInfo = \App\Models\Blog\PlaceContactTabInfo::where('place_info_card_id',$PlaceInfoCard->id)->first();
            $PlaceContactTabInfoAddress = \App\Models\Blog\PlaceContactTabInfoAddress::where('place_contact_tab_info_id',$PlaceInfoCard->id)->first();
            $PlaceContactTabInfoSocialMediaLinks = \App\Models\Blog\PlaceContactTabInfoSocialMediaLink::where('place_contact_tab_info_id',$PlaceInfoCard->id)->first();

            $PlaceInfoCard->description = $request->description;
            $PlaceInfoCard->save();

            if($PlaceContactTabInfo){
                $PlaceContactTabInfo->website_link = $request->website_link;
                $PlaceContactTabInfo->booking_com_link = $request->Booking_com;
                $PlaceContactTabInfo->save();
            }else if ($request->website_link || $request->Booking_com){
                PlaceContactTabInfo::create([
                    'place_info_card_id'=>$PlaceInfoCard->id,
                    'website_link' => $request->website_link,
                    'booking_com_link' => $request->Booking_com
                ]);
            }


            if($PlaceContactTabInfoAddress){
                $PlaceContactTabInfoAddress->address = $request->address1;
                $PlaceContactTabInfoAddress->save();
            }else if ($request->address1){
                PlaceContactTabInfoAddress::create([
                    'place_contact_tab_info_id' => $PlaceInfoCard->id,
                    'address' => $request->address1
                ]);
            }

            if($PlaceContactTabInfoSocialMediaLinks){
                $PlaceContactTabInfoSocialMediaLinks->facebook_link = $request->facebook_link;
                $PlaceContactTabInfoSocialMediaLinks->twitter_link = $request->twitter_link;
                $PlaceContactTabInfoSocialMediaLinks->instagram_link = $request->instagram_link;
                $PlaceContactTabInfoSocialMediaLinks->pinterest_link = $request->pinterest_link;
                $PlaceContactTabInfoSocialMediaLinks->save();
            }else if ($request->facebook_link || $request->twitter_link || $request->instagram_link || $request->pinterest_link || $request->pinterest_link) {
                PlaceContactTabInfoSocialMediaLink::create([
                    'place_contact_tab_info_id' => $PlaceInfoCard->id,
                    'facebook_link' => $request->facebook_link,
                    'twitter_link' => $request->twitter_link,
                    'pinterest_link' => $request->pinterest_link
                ]);
            }
        }
        return Redirect::back();
    }

    public function facilities(Request $request) {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_PLACE_UPDATE')]);
        $request->validate([
            'placeFacilities'=>'required'
        ]);
        $placeFacilityCount = 0;
       foreach ($request->placeFacilities as $placeFacility){
           $PlaceFacilityType = PlaceFacilityType::find($placeFacility);
           if($PlaceFacilityType){
               $PlaceFacility = PlaceFacility::Where(['place_id'=>$request->placeId,'place_facility_type_id'=>$PlaceFacilityType->id])->first();
               if($PlaceFacility){
                   if(!isset($request->placeFacilityAvailabilities[$placeFacilityCount])){
                       $PlaceFacility->delete();
                   }
               }else{
                   if(isset($request->placeFacilityAvailabilities[$placeFacilityCount])){
                       PlaceFacility::create([
                           'place_id'=>$request->placeId,
                           'place_facility_type_id'=>$PlaceFacilityType->id
                       ]);
                   }
               }
           }
           $placeFacilityCount++;
       }

       return Redirect::back();
    }

    public function album($id){
        $Place = Place::findOrFail($id);
        $Images = ContentImage::where('place_id',$Place->id)->get();
        return view('admin.interfaces.place.album.index',compact(['Place','Images']));
    }

    public function albumStore(Request $request){
        echo 'album';
    }
}
