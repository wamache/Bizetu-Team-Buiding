<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('media_type')->default('image')->after('title'); // 'image' or 'video'
            $table->text('youtube_url')->nullable()->after('media_type');
            $table->text('bunny_url')->nullable()->after('youtube_url');
        });
    }

    public function down()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['media_type', 'youtube_url', 'bunny_url']);
        });
    }
};
