<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW resource_cards AS
            SELECT
                CONCAT('PLACE',id) as id,
                'places' as table_name,
                title,
                summary,
                slug,
                thumbnail,
                category_id,
                category_slug,
                contact,
                email,
                lat,
                lng,
                location,
                google_location_description,
                booking_url,
                booking_rating,
                booking_min_price,
                instagram_url,
                pinterest_url,
                twitter_url,
                website_url,
                facebook_url,
                content_type_id,
                views,
                type
            FROM places
            WHERE status='publish'
            UNION
            SELECT
             CONCAT('BLOG',id) as id,
             'blogs' as table_name,
                title,
                summery as summary,
                slug,
                thumbnail,
                category_id,
                category_slug,
                null as contact,
                null as email,
                lat,
                lng,
                location,
                google_location_description,
                null as booking_url,
                null as booking_rating,
                null as booking_min_price,
                null as instagram_url,
                null as pinterest_url,
                null as twitter_url,
                null as website_url,
                null as facebook_url,
                content_type_id,
                views,
                'blog' as type
            FROM blogs
            WHERE status='publish'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS resource_cards');
    }
}
