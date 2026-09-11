<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menu_types', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->string('title', 200)->nullable();
            $table->string('key', 200)->nullable(); // e.g. "main_menu", "footer_menu"
            $table->integer('position')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_types');
    }
};
