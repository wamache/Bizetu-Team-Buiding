@extends('site.layout')

@section('content')

    <article class="page-content">

        {{-- Page heading --}}
        <header class="page-header">

            <h1>
                {{ $page->header_title ?: $page->title }}
            </h1>

        </header>

        {{-- Page body --}}
        @if($page->description)

            <div class="page-description">
                {!! $page->description !!}
            </div>

        @else

            <div class="page-description">
                <p>No content has been added to this page yet.</p>
            </div>

        @endif

    </article>

@endsection
