@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', ['name' => 'title', 'label' => 'Site Name'])
    @formField('input', ['name' => 'tag_line', 'label' => 'Tagline'])
    @formField('input', ['name' => 'primary_color', 'label' => 'Primary Color (hex)'])
    @formField('input', ['name' => 'secondary_color', 'label' => 'Secondary Color (hex)'])
    @formField('input', ['name' => 'third_color', 'label' => 'Accent Color (hex)'])
    @formField('input', ['name' => 'footer_color', 'label' => 'Footer Color (hex)'])
@endsection
