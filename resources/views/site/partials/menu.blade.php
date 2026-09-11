{{--
    Renders a menu tree. Top-level items whose menuType layout is
    "mega" render as a multi-column mega menu on hover/click; every
    other level renders as a plain nested <ul>.

    Expects: $items (Collection of App\Models\Menu), $depth (int, optional)
--}}
@php($depth = $depth ?? 0)

<ul class="menu menu--depth-{{ $depth }}">
    @foreach ($items as $item)
        @php($isMega = $depth === 0 && $item->menuType?->isMega() && $item->children->isNotEmpty())

        <li class="menu__item
            @if($item->children->isNotEmpty()) has-submenu @endif
            @if($isMega) has-mega-menu @endif
            @if($item->isActive()) is-active @endif
            {{ $item->css_class }}"
        >
            <a
                href="{{ $item->resolvedUrl() }}"
                class="menu__link"
                @if($item->target_blank) target="_blank" rel="noopener" @endif
            >
                @if ($icon = $item->image('icon', 'default'))
                    <img src="{{ $icon }}" alt="" class="menu__icon">
                @endif
                {{ $item->title }}
            </a>

            @if ($item->children->isNotEmpty())
                @if ($isMega)
                    <div class="mega-menu" style="--columns: {{ $item->menuType->columns_count }}">
                        @for ($col = 0; $col < $item->menuType->columns_count; $col++)
                            <div class="mega-menu__column">
                                @foreach ($item->children->where('column_index', $col) as $card)
                                    <div class="mega-menu__card">
                                        @if ($image = $card->image('image', 'default'))
                                            <img src="{{ $image }}" alt="" class="mega-menu__card-image">
                                        @endif
                                        <a href="{{ $card->resolvedUrl() }}"
                                           @if($card->target_blank) target="_blank" rel="noopener" @endif
                                           class="mega-menu__card-title @if($card->isActive()) is-active @endif">
                                            {{ $card->title }}
                                        </a>
                                        @if ($card->subtitle)
                                            <p class="mega-menu__card-subtitle">{{ $card->subtitle }}</p>
                                        @endif
                                        @if ($card->cta_label)
                                            <a href="{{ $card->resolvedUrl() }}"
                                               class="btn btn--{{ $card->cta_style ?? 'link' }}">
                                                {{ $card->cta_label }}
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                    </div>
                @else
                    @include('site.partials.menu', [
                        'items' => $item->children,
                        'depth' => $depth + 1,
                    ])
                @endif
            @endif
        </li>
    @endforeach
</ul>
