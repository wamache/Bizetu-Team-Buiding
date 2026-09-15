@extends('twill::layouts.form')

{{-- 1. THIS CONTROLS THE "ADD NEW" MODAL (Image 2) --}}
@section('formFields')
    
    @formField('input', [
        'name' => 'title',
        'label' => 'Menu Title',
        'note' => 'Menu display name, e.g. "Home"',
        'maxlength' => 255,
        'required' => true,
    ])

    @formField('input', [
        'name' => 'key',
        'label' => 'Key',
        'note' => 'Slug-like url',
        'maxlength' => 200,
    ])

    @php
        $menuTypes = \App\Models\MenuType::query()
            ->where('published', true)
            ->orderBy('position')
            ->orderBy('title')
            ->get();
    @endphp

    @formField('select', [
        'name' => 'menu_type_id',
        'label' => 'Menu Type',
        'options' => $menuTypes->map(function ($menuType) {
            return [
                'value' => $menuType->id,
                'label' => $menuType->title,
            ];
        })->values()->toArray(),
    ])
@stop

{{-- 2. THIS CONTROLS THE MAIN EDIT PAGE --}}
@section('contentFields')

    @formField('input', [
        'name' => 'position',
        'label' => 'Position',
        'type' => 'number',
        'min' => 1,
        'default' => 1,
    ])

@stop
