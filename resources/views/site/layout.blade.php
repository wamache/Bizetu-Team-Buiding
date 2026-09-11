<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $settings->title ?? 'Bizetu Hub' }}</title>
    <style>
        :root {
            --primary: {{ $settings->primary_color ?? '#0d6efd' }};
            --secondary: {{ $settings->secondary_color ?? '#6c757d' }};
        }
    </style>
</head>
<body>
    <nav class="main-menu">
        @foreach($mainMenu as $item)
            <a href="{{ $item->page ? route('page.show', $item->page->slug) : $item->custom_url }}"
               @if($item->open_new_tab) target="_blank" @endif>
                {{ $item->title }}
            </a>
        @endforeach
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        @foreach($footerMenu as $item)
            <a href="{{ $item->page ? route('page.show', $item->page->slug) : $item->custom_url }}">
                {{ $item->title }}
            </a>
        @endforeach
    </footer>
</body>
</html>
