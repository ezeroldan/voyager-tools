@foreach($items as $menu_item)
   @if(!$menu_item->children->isEmpty())
        <b-nav-item-dropdown>

            <template slot="button-content">
                @if ($menu_item->icon_class) <span class="{{ $menu_item->icon_class }}"></span> @endif
                {{ $menu_item->title }}
            </template> 

            @foreach($menu_item->children as $children_item)
                <b-dropdown-item href="{{ $children_item->link() }}">
                    @if ($children_item->icon_class) <span class="{{ $children_item->icon_class }}"></span> @endif
                    {{ $children_item->title }}
                </b-dropdown-item>
            @endforeach
			
        </b-nav-item-dropdown>
    @else
        <b-nav-item href="{{ $menu_item->link() }}">
            @if ($menu_item->icon_class) <span class="{{ $menu_item->icon_class }}"></span> @endif
            {{ $menu_item->title }}
        </b-nav-item>
    @endif
@endforeach