<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use Illuminate\Database\Eloquent\Builder;

class Menu extends Model
{
    use HasPosition;
    use HasRevisions;

    protected $fillable = [
        'published',
        'position',
        'key',
        'menu_type_id',
    ];

    protected $casts = [
        'published'    => 'boolean',
        'position'     => 'integer',
        'menu_type_id' => 'integer',
    ];

    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }

    public function scopeVisibleTo(Builder $query, $user): Builder
    {
        return $query;
    }

    public function getMenuTypeValueAttribute()
    {
        return $this->menuType->title ?? '-';
    }

    public function getLinkAttribute()
    {
        // No page_id/custom_url in current schema — menus are label-only for now.
        return '#';
    }
}
