@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', ['name' => 'title', 'label' => 'Title'])
    @formField('input', ['name' => 'key', 'label' => 'Key (e.g. main_menu, footer_menu)'])
@endsection

@section('fieldsetsAdditional')
    @formFieldset(['id' => 'seo', 'title' => 'Publishing', 'fields' => []])
@endformFieldset
@endsection
