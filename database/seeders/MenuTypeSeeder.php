<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuType;

class MenuTypeSeeder extends Seeder
{
    public function run()
    {
        MenuType::firstOrCreate(
            ['key' => 'main_menu'],
            ['title' => 'Main Menu', 'published' => true, 'position' => 1]
        );

        MenuType::firstOrCreate(
            ['key' => 'footer_menu'],
            ['title' => 'Footer Menu', 'published' => true, 'position' => 2]
        );
    }
}
