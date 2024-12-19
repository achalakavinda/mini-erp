<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiteMeta extends Model
{
    protected $guarded = ['id'];

    public static function siteMetaByPath($path)
    {
        $SiteMeta = [];
        $SiteMeta = DB::table('site_metas')
            ->leftJoin('site_meta_tags', 'site_meta_tags.site_meta_id', '=', 'site_metas.id')
            ->leftJoin('site_meta_seo_tags', 'site_meta_seo_tags.id', '=', 'site_meta_tags.site_meta_seo_tag_id')
            ->select(
                'site_metas.id',
                'site_metas.name',
                'site_metas.path',
                'site_metas.type',
                'site_metas.set',
                'site_meta_seo_tags.name',
                'site_meta_seo_tags.property_type',
                'site_meta_seo_tags.property',
                'site_meta_tags.content'
            )
            ->where('site_metas.path',$path)
            ->get();

        return $SiteMeta;
    }

    public static function siteMetaByBlogId($blogId)
    {
        $SiteMeta = [];
        $SiteMeta = DB::table('site_metas')
            ->leftJoin('site_meta_tags', 'site_meta_tags.site_meta_id', '=', 'site_metas.id')
            ->leftJoin('site_meta_seo_tags', 'site_meta_seo_tags.id', '=', 'site_meta_tags.site_meta_seo_tag_id')
            ->select(
                'site_metas.id',
                'site_metas.name',
                'site_metas.path',
                'site_metas.type',
                'site_metas.set',
                'site_meta_seo_tags.name',
                'site_meta_seo_tags.property_type',
                'site_meta_seo_tags.property',
                'site_meta_tags.content'
            )
            ->where('site_metas.blog_id',$blogId)
//            ->where('site_meta_tags.content','!=', null)
            ->get();

        return $SiteMeta;
    }

    public static function siteMetaByPlaceId($placeId)
    {
        $SiteMeta = [];
        $SiteMeta = DB::table('site_metas')
            ->leftJoin('site_meta_tags', 'site_meta_tags.site_meta_id', '=', 'site_metas.id')
            ->leftJoin('site_meta_seo_tags', 'site_meta_seo_tags.id', '=', 'site_meta_tags.site_meta_seo_tag_id')
            ->select(
                'site_metas.id',
                'site_metas.name',
                'site_metas.path',
                'site_metas.type',
                'site_metas.set',
                'site_meta_seo_tags.name',
                'site_meta_seo_tags.property_type',
                'site_meta_seo_tags.property',
                'site_meta_tags.content'
            )
            ->where('site_metas.place_id',$placeId)
//            ->where('site_meta_tags.content','!=', null)
            ->get();

        return $SiteMeta;
    }
}
