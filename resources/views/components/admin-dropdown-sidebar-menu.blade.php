<li class="sidebar-item  has-sub @if (Request::segment(1) == $activate)
    active
@endif">
    <a href="#" class='sidebar-link'>
        {{ $masterIcon }}
        <span>{{ $masterTitle }}</span>
    </a>
    <ul class="submenu ">
        {{ $slot }}
    </ul>
</li>

{{-- <li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-person-badge-fill"></i>
        <span>Authentication</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="auth-login.html">Login</a>
        </li>
        <li class="submenu-item ">
            <a href="auth-register.html">Register</a>
        </li>
        <li class="submenu-item ">
            <a href="auth-forgot-password.html">Forgot Password</a>
        </li>
    </ul>
</li> --}}