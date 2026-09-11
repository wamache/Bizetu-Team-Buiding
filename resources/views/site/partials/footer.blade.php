<footer class="site-footer">
    <ul class="footer-nav">
        @forelse($footerMenu as $item)
            <li>
                <a href="{{ $item->link ?? '#' }}">
                    {{ $item->key }}
                </a>
            </li>
        @empty
            <li><a href="{{ route('home') }}">Home</a></li>
        @endforelse
    </ul>
    <p class="footer-bottom">
        &copy; {{ date('Y') }} BiZetu Hub. All rights reserved · Nairobi, Kenya
    </p>
</footer>
