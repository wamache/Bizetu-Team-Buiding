@extends('twill::layouts.form')

@section('contentFields')
    @formField('medias', ['name' => 'image', 'label' => 'Slide Image', 'note' => 'Recommended ratio 21:9'])
    @formField('input', ['name' => 'title', 'label' => 'Slide Title'])
    @formField('textarea', ['name' => 'subtitle', 'label' => 'Subtitle'])
    @formField('input', ['name' => 'button_text', 'label' => 'Button Text'])
    @formField('input', ['name' => 'button_url', 'label' => 'Button URL'])
@endsection
