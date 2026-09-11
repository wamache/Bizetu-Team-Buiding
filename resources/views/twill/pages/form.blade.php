@extends('twill::layouts.form')

@section('contentFields')

    @formField('input', [
        'name' => 'key',
        'label' => 'Key',
        'maxlength' => 200,
    ])

    @formField('input', [
        'name' => 'position',
        'label' => 'Position',
        'type' => 'number',
        'min' => 1,
        'default' => 1,
    ])

    @formField('input', [
        'name' => 'header_title',
        'label' => 'Header Title',
        'maxlength' => 200,
    ])

    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'toolbarOptions' => [
            'bold',
            'italic',
            'strike',
            'underline',
            'link',
            'bulletList',
            'orderedList',
            'blockquote',
        ],
    ])

    @formField('medias', [
        'name' => 'hero_image',
        'label' => 'Hero image',
        'max' => 1,
    ])

    {{-- Add Content --}}
    @formField('block_editor', [
        'name' => 'blocks',
    ])

@stop
