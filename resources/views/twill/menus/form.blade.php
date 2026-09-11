@extends('twill::layouts.form')

@section('contentFields')

    @formField('input', [
        'name' => 'position',
        'label' => 'Position',
        'type' => 'number',
        'min' => 1,
        'default' => 1,
    ])

    @formField('input', [
        'name' => 'key',
        'label' => 'Key',
        'maxlength' => 200,
        'required' => true,
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
        'required' => true,
    ])

@stop
