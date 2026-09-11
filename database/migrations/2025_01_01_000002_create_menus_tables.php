<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->integer('position')
                ->unsigned()
                ->nullable();

            $table->string('key', 200)
                ->nullable();

            $table->foreignId('menu_type_id')
                ->nullable()
                ->constrained('menu_types')
                ->nullOnDelete();
        });

        Schema::create('menu_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'menu');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_revisions');
        Schema::dropIfExists('menus');
    }
};
