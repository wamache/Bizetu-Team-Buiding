@extends('site.layout')

@section('content')

<section class="hero-slider">

    @forelse($sliders as $slide)

        <div class="slide">

            @if($slide->image())
                <img
                    src="{{ $slide->image() }}"
                    alt="{{ $slide->title }}"
                >
            @endif

            @if($slide->title)
                <h1>{{ $slide->title }}</h1>
            @endif

            @if($slide->subtitle)
                <p>{{ $slide->subtitle }}</p>
            @endif

            @if($slide->button_text && $slide->button_url)
                <a
                    href="{{ $slide->button_url }}"
                    class="btn"
                >
                    {{ $slide->button_text }}
                </a>
            @endif

        </div>

    @empty

        <div class="slide">
            <h1>Welcome</h1>
        </div>

    @endforelse

</section>

@endsection
