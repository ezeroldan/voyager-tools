<ul class="list-inline mb-0 text-center text-sm-left">
    @foreach($items as $menu_item)
        @if(!$menu_item->children->isEmpty())
            
        @else
            <li class="list-inline-item">
                <a href="{{ $menu_item->link() }}">
                    @if ($menu_item->icon_class) <span class="{{ $menu_item->icon_class }}"></span> @endif
                    {{ $menu_item->title }}
                </a>
            </li>
        @endif
    @endforeach
</ul>