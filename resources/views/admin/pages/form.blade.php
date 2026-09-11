@extends('twill::layouts.form')

@section('contentFields')

    @if ($errors->any())
        <div style="
            background:#fee2e2;
            border:1px solid #f87171;
            padding:12px;
            margin-bottom:16px;
            border-radius:4px;
        ">
            <strong>Validation errors:</strong>

            <ul style="margin:8px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @formField('input', [
        'name' => 'title',
        'label' => 'Title',
    ])

    @formField('input', [
        'name' => 'header_title',
        'label' => 'Header Title (banner heading)',
    ])

    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description / Body',
    ])

    @formField('select', [
        'name' => 'menu_type_id',
        'label' => 'Assign to Menu Type',
        'options' => $menuTypes ?? [],
    ])

    @formField('medias', [
        'name' => 'cover',
        'label' => 'Cover Image',
    ])

@endsection
