<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;

class Slider extends Model implements Sortable
{
    use HasPosition, HasMedias, HasRevisions;

    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_url',
        'published',
        'position',
        'media_type',
        'youtube_url',
        'bunny_url',
    ];

    public $mediasParams = [
        'image' => [
            'default' => [
                ['name' => 'default', 'ratio' => 21 / 9],
            ],
        ],
        'video_thumbnail' => [
            'default' => [
                ['name' => 'default', 'ratio' => 21 / 9],
            ],
        ],
    ];

    public function getYoutubeEmbedUrlAttribute()
    {
        if (! $this->youtube_url) {
            return null;
        }

        preg_match(
            '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
            $this->youtube_url,
            $matches
        );

        $videoId = $matches[1] ?? null;

        return $videoId
            ? "https://www.youtube.com/embed/{$videoId}?autoplay=1&mute=1&loop=1&playlist={$videoId}&controls=0&modestbranding=1&rel=0"
            : null;
    }
}
