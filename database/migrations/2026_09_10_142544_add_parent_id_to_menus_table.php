<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->foreignId('parent_id')
                ->nullable()
                ->after('menu_type_id')
                ->constrained('menus')
                ->nullOnDelete();

            $table->unsignedInteger('column_index')
                ->default(0)
                ->after('parent_id');
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'column_index']);
        });
    }
};
