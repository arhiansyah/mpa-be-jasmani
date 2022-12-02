<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo.png') }} " alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <x-admin-basic-sidebar-menu link="{{ route('home') }}" activate="home">
                    <x-slot name="icon"><i class="bi bi-grid-fill"></i></x-slot>
                    <x-slot name="text">Dashboard</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-basic-sidebar-menu link="{{ route('exercise.index') }}" activate="exercise">
                    <x-slot name="icon"><i class="bi bi-stack"></i></x-slot>
                    <x-slot name="text">Exercise</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-basic-sidebar-menu link="{{ route('training.index') }}" activate="training">
                    <x-slot name="icon"><i class="bi bi-layout-text-sidebar-reverse"></i></x-slot>
                    <x-slot name="text">Training</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-basic-sidebar-menu link="{{ route('group-training.index') }}" activate="group-training">
                    <x-slot name="icon"><i class="bi bi-lightning"></i></x-slot>
                    <x-slot name="text">Group Training</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-basic-sidebar-menu link="{{ route('exercise-session.index') }}" activate="exercise-session">
                    <x-slot name="icon"><i class="bi bi-clock-history"></i></x-slot>
                    <x-slot name="text">Exercise Session</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-basic-sidebar-menu link="{{ route('calendar.index') }}" activate="calendar">
                    <x-slot name="icon"><i class="bi bi-calendar"></i></x-slot>
                    <x-slot name="text">Calendar</x-slot>
                </x-admin-basic-sidebar-menu>
                <x-admin-dropdown-sidebar-menu>
                    <x-slot name="masterIcon"><i class="fa-solid fa-ranking-star"></i></x-slot>
                    <x-slot name="masterTitle">Sport Grade</x-slot>
                    <x-slot name="activate">grade</x-slot>
                    <x-admin-list-menu-sidebar-dropdown link="{{ route('sports.index') }}" :title="__('Sport')" activate="sports">
                        <x-slot name="icon"><i class="fa-solid fa-basketball me-3"></i></x-slot>
                    </x-admin-list-menu-sidebar-dropdown>
                </x-admin-dropdown-sidebar-menu>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>