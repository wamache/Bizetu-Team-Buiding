<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->string('title', 200)->nullable();
            $table->text('subtitle')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_url')->nullable();
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('slider_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'slider');
        });
    }

    public function down()
    {
        Schema::dropIfExists('slider_revisions');
        Schema::dropIfExists('sliders');
    }
};
