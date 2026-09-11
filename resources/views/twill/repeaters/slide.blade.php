@twillRepeaterTitle('Slider')
@twillRepeaterTrigger('Add Slider')
@twillRepeaterGroup('app')

<x-twill::select
    name="media_type"
    label="Media Type"
    :options="[
        ['value' => 'image', 'label' => 'Image'],
        ['value' => 'video', 'label' => 'Video'],
    ]"
    default="image"
/>

<x-twill::medias
    name="image"
    label="Image"
    :grid="false"
    note="Used when Media Type is Image"
/>

<x-twill::input
    name="youtube_url"
    label="YouTube Video URL"
    note="Used when Media Type is Video. First URL will be picked."
/>

<x-twill::input
    name="bunny_url"
    label="Bunny.net Video URL"
    note="Full URL, e.g. https://player.mediadelivery.net/embed/..."
/>

<x-twill::medias
    name="video_thumbnail"
    label="Video Thumbnail (Optional)"
    :grid="false"
    note="Fallback image shown before video loads"
/>

<x-twill::input
    name="title"
    label="Title"
    :translated="true"
/>

<x-twill::wysiwyg
    name="description"
    label="Description"
    placeholder="Description"
    :toolbar-options="[
        'bold',
        'italic',
        'underline',
        'link',
        'clean',
    ]"
    :translated="true"
/>

<x-twill::input
    name="button_text"
    label="Button Text"
    :translated="true"
/>

<x-twill::input
    name="button_url"
    label="Button URL"
/>
