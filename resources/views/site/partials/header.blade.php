<header class="site-header">
    <a href="{{ route('home') }}" class="logo">
        @if(isset($settings) && $settings && $settings->image('logo'))
            <img src="{{ $settings->image('logo', 'default') }}" alt="{{ $settings->title ?? 'BiZetu Hub' }}" class="logo-img">
        @else
            BiZetu <span>Hub</span>
        @endif
    </a>

    <nav>
        <ul class="main-nav">
            @forelse($headerMenu as $item)
                <li>
                    <a href="{{ $item->link ?? '#' }}">
                        {{ $item->key }}
                    </a>
                </li>
            @empty
                <li><a href="{{ route('home') }}">Home</a></li>
            @endforelse
            <li>
                <a href="#" class="btn-cta">Book a Session</a>
            </li>
        </ul>
    </nav>
</header>
