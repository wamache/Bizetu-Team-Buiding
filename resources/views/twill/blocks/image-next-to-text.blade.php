@twillBlockTitle('Image Next To Text')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::select
    name="image_side"
    label="Image Side"
    :options="[
        ['value' => 'left', 'label' => 'Left'],
        ['value' => 'right', 'label' => 'Right'],
    ]"
    default="left"
/>

<x-twill::medias
    name="image"
    label="Image"
    :grid="false"
    note="Recommended: 550 x 550px (square works best)"
/>

<x-twill::input
    name="image_caption_title"
    label="Image Caption Title"
    :translated="true"
/>

<x-twill::input
    name="image_caption_subtitle"
    label="Image Caption Subtitle"
    :translated="true"
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
        'blockquote',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        'clean',
    ]"
    :translated="true"
/>

<x-twill::input
    name="read_more_label"
    label="Read More — Button Label"
    :translated="true"
/>

<x-twill::input
    name="read_more_url"
    label="Read More — URL"
/>
