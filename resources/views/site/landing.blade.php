<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->title ?? 'BiZetu Hub' }}</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    @include('site.partials.header')

    @php
        // Grab the Slide Show block on this page, and its nested Slide repeater items.
        $sliderBlock = optional($page->blocks)->firstWhere('type', 'slide-show');
        $slides = $sliderBlock
            ? $sliderBlock->children->sortBy('position')->values()
            : collect();

        // Turn a raw YouTube URL into an embeddable URL, since the repeater
        // only stores the plain URL (no model accessor exists for blocks).
        $youtubeEmbedUrl = function (?string $url) {
            if (! $url) {
                return null;
            }
            if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([A-Za-z0-9_-]{11})/', $url, $m)) {
                return 'https://www.youtube.com/embed/' . $m[1] . '?autoplay=1&mute=1&controls=0&playsinline=1';
            }
            return null;
        };
    @endphp

    @if($slides->count())
        <section class="hero-slider">
            <div class="hero-track">
                @foreach($slides as $index => $slide)
                    @php
                        $mediaType = $slide->input('media_type');
                        $youtubeUrl = $slide->input('youtube_url');
                        $bunnyUrl = $slide->input('bunny_url');
                    @endphp
                    <div class="hero-slide @if($index === 0) active @endif" data-slide="{{ $index }}">

                        @if($mediaType === 'video')
                            <div class="hero-media">
                                @if($bunnyUrl)
                                    <iframe
                                        src="{{ $bunnyUrl }}"
                                        class="hero-video"
                                        loading="lazy"
                                        allow="autoplay; fullscreen"
                                        allowfullscreen>
                                    </iframe>
                                @elseif($youtubeEmbedUrl($youtubeUrl))
                                    <iframe
                                        src="{{ $youtubeEmbedUrl($youtubeUrl) }}"
                                        class="hero-video"
                                        loading="lazy"
                                        allow="autoplay; encrypted-media"
                                        allowfullscreen>
                                    </iframe>
                                @elseif($slide->image('video_thumbnail'))
                                    <img src="{{ $slide->image('video_thumbnail') }}" class="hero-media-img" alt="{{ $slide->translatedInput('title') }}">
                                @endif
                            </div>
                        @elseif($slide->image('image'))
                            <div class="hero-media">
                                <img src="{{ $slide->image('image') }}" class="hero-media-img" alt="{{ $slide->translatedInput('title') }}">
                            </div>
                        @endif

                        <div class="hero-overlay">
                            <h1>{!! $slide->translatedInput('title') !!}</h1>
                            @if($slide->translatedInput('description'))
                                <div>{!! $slide->translatedInput('description') !!}</div>
                            @endif
                            @if($slide->translatedInput('button_text'))
                                <a href="{{ $slide->input('button_url') ?? '#' }}" class="btn-cta">{{ $slide->translatedInput('button_text') }}</a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="hero-controls">
                @if($slides->contains(fn($s) => $s->input('media_type') === 'video'))
                    <button class="hero-icon-btn" id="muteBtn" onclick="toggleMute()">🔇</button>
                    <button class="hero-icon-btn" id="pauseBtn" onclick="togglePause()">⏸</button>
                @endif
                <button class="hero-icon-btn" onclick="changeSlide(-1)">&lsaquo;</button>
                <button class="hero-icon-btn" onclick="changeSlide(1)">&rsaquo;</button>
            </div>

            @if($slides->count() > 1)
                <div class="hero-dots">
                    @foreach($slides as $index => $slide)
                        <button class="dot @if($index === 0) active @endif" data-dot="{{ $index }}" onclick="goToSlide({{ $index }})"></button>
                    @endforeach
                </div>
            @endif
        </section>
    @else
        <section class="hero-slider">
            <div class="hero-slide active">
                <div class="hero-overlay">
                    <div class="hero-eyebrow">Welcome</div>
                    <h1>{{ $page->header_title ?? $page->title ?? 'BiZetu Hub' }}</h1>
                </div>
            </div>
        </section>
    @endif

    <main>
        @if($page)
            <section class="page-section">
                @if($page->image('hero_image'))
                    <img src="{{ $page->image('hero_image', 'default') }}" alt="{{ $page->header_title }}">
                @endif
                <div class="body">
                    {!! $page->description !!}
                </div>
            </section>
        @endif
    </main>

    <div class="trust-banner">
        Trusted by <span>50+</span> Professionals
    </div>

    @include('site.partials.footer')

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.dot');
        let autoplayTimer;

        function goToSlide(index) {
            slides.forEach(s => s.classList.remove('active'));
            dots.forEach(d => d.classList.remove('active'));
            slides[index]?.classList.add('active');
            dots[index]?.classList.add('active');
            currentSlide = index;
        }

        function changeSlide(direction) {
            let next = currentSlide + direction;
            if (next < 0) next = slides.length - 1;
            if (next >= slides.length) next = 0;
            goToSlide(next);
        }

        function startAutoplay() {
            autoplayTimer = setInterval(() => changeSlide(1), 7000);
        }

        function togglePause() {
            const btn = document.getElementById('pauseBtn');
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
                btn.textContent = '▶';
            } else {
                startAutoplay();
                btn.textContent = '⏸';
            }
        }

        let muted = true;
        function toggleMute() {
            muted = !muted;
            document.getElementById('muteBtn').textContent = muted ? '🔇' : '🔊';
            document.querySelectorAll('.hero-video').forEach(iframe => {
                const src = iframe.src;
                iframe.src = src.includes('mute=1')
                    ? src.replace('mute=1', 'mute=0')
                    : src.replace('mute=0', 'mute=1');
            });
        }

        if (slides.length > 1) {
            startAutoplay();
        }
    </script>
</body>
</html>
