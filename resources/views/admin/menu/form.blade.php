@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', ['name' => 'title', 'label' => 'Title / Label'])

    @formField('select', [
        'name' => 'menu_type_id',
        'label' => 'Menu Type',
        'options' => $menuTypes ?? [],
    ])

    @formField('select', [
        'name' => 'page_id',
        'label' => 'Link to Page (optional)',
        'options' => $pages ?? [],
    ])

    @formField('input', ['name' => 'custom_url', 'label' => 'Or custom URL'])

    @formField('checkbox', ['name' => 'open_new_tab', 'label' => 'Open in new tab'])
@endsection
