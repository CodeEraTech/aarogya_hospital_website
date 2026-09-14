<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        foreach ([
            ['seo_meta_title','Aarogya Hospital | Advanced Care. Human at Heart.','Main SEO'],
            ['seo_meta_description','Advanced orthopaedic, robotic joint replacement, trauma, emergency and fertility care in Hisar, Haryana.','Main SEO'],
            ['website_logo','assets/hospital/images/aarogya-logo.png','Branding'],
            ['website_favicon','favicon.ico','Branding'],
            ['social_instagram','','Social Media'],['social_facebook','','Social Media'],['social_youtube','','Social Media'],['social_linkedin','','Social Media'],
        ] as [$key,$value,$group]) DB::table('settings')->updateOrInsert(['key'=>$key],['value'=>$value,'group'=>$group,'updated_at'=>now(),'created_at'=>now()]);
    }
    public function down(): void { DB::table('settings')->whereIn('key',['seo_meta_title','seo_meta_description','website_logo','website_favicon','social_instagram','social_facebook','social_youtube','social_linkedin'])->delete(); }
};
