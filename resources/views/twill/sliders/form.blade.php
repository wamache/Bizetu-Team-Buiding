@extends('twill::layouts.form')

@section('contentFields')

    @formField('select', [
        'name' => 'media_type',
        'label' => 'Media Type',
        'options' => [
            ['value' => 'image', 'label' => 'Image'],
            ['value' => 'video', 'label' => 'Video'],
        ],
        'required' => true,
    ])

    @formField('medias', [
        'name' => 'image',
        'label' => 'Slide Image',
        'note' => 'Used when Media Type is Image',
        'max' => 1,
    ])

    @formField('input', [
        'name' => 'youtube_url',
        'label' => 'YouTube Video URL',
        'note' => 'Used when Media Type is Video. First URL will be picked.',
    ])

    @formField('input', [
        'name' => 'bunny_url',
        'label' => 'Bunny.net Video URL',
        'note' => 'Full URL, e.g. https://player.mediadelivery.net/embed/...',
    ])

    @formField('medias', [
        'name' => 'video_thumbnail',
        'label' => 'Video Thumbnail (Optional)',
        'note' => 'Fallback image shown before video loads',
        'max' => 1,
    ])

    @formField('input', ['name' => 'title', 'label' => 'Slide Title'])
    @formField('textarea', ['name' => 'subtitle', 'label' => 'Subtitle / Description'])
    @formField('input', ['name' => 'button_text', 'label' => 'Button Text'])
    @formField('input', ['name' => 'button_url', 'label' => 'Button URL'])

@stop
