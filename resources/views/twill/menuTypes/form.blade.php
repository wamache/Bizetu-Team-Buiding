@extends('twill::layouts.form')

@section('contentFields')

    @formField('input', [
        'name' => 'position',
        'label' => 'Position',
        'type' => 'number',
    ])

@stop
