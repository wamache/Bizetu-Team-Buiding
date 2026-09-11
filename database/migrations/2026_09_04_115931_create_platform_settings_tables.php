<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        /*
        |--------------------------------------------------------------------------
        | Platform Settings
        |--------------------------------------------------------------------------
        */
        Schema::create('platform_settings', function (Blueprint $table) {

            // Creates:
            // - id
            // - published
            // - deleted_at
            // - created_at
            // - updated_at
            createDefaultTableFields($table);

            $table->string('title', 200)->nullable();

            $table->text('tag_line')->nullable();

            // Brand colours
            $table->string('primary_color', 20)->nullable();
            $table->string('secondary_color', 20)->nullable();
            $table->string('third_color', 20)->nullable();

            // Course/action colours
            $table->string('enroll_color', 20)->nullable();
            $table->string('progress_color', 20)->nullable();
            $table->string('retake_color', 20)->nullable();
            $table->string('completed_color', 20)->nullable();

            // Navigation colours
            $table->string('menu_color', 20)->nullable();
            $table->string('menu_color_active', 20)->nullable();

            // Footer
            $table->string('footer_color', 20)->nullable();

            // Twill ordering
            $table->unsignedInteger('position')->nullable();
        });

        /*
        |--------------------------------------------------------------------------
        | Platform Setting Slugs
        |--------------------------------------------------------------------------
        */
        Schema::create('platform_setting_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'platform_setting');
        });

        /*
        |--------------------------------------------------------------------------
        | Platform Setting Revisions
        |--------------------------------------------------------------------------
        */
        Schema::create('platform_setting_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'platform_setting');
        });
    }

    public function down()
    {
        Schema::dropIfExists('platform_setting_revisions');
        Schema::dropIfExists('platform_setting_slugs');
        Schema::dropIfExists('platform_settings');
    }
};
