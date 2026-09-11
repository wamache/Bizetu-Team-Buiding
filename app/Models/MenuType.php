<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasPosition;

class MenuType extends Model
{
    use HasPosition;

    protected $fillable = [
        'published',
        'title',
        'key',
        'position',
    ];

    protected $casts = [
        'published' => 'boolean',
        'position' => 'integer',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class)
            ->orderBy('position');
    }
}
