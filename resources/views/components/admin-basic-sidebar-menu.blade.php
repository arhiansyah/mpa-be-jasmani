<li class="sidebar-item @if (Request::segment(1) == $activate)
    active
@endif">
    <a href="{{ $link }}" class='sidebar-link'>
        {{ $icon }}
        <span>{{ $text }}</span>
    </a>
</li>