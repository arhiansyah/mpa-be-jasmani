<li class="submenu-item @if (Request::segment(2) == $activate)
    active
@endif">
    <a href="{{ $link }}" class="sidebar-link">{{ $icon }}{{ $title }}</a>
</li>