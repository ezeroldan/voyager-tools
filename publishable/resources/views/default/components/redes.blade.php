@foreach($items as $menu_item)
    <a class="btn btn-primary btn-sm" target="{{ $menu_item->target }}" href="{{ $menu_item->link() }}" title="{{ $menu_item->title }}">
        @if ($menu_item->icon_class) 
            <i class="{{ $menu_item->icon_class }}"></i> 
        @endif
    </a>
@endforeach