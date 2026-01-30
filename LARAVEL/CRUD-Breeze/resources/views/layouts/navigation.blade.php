<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <x-application-logo class="h-9 w-auto text-dark" />
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">

            <!-- Left Side -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}"
                       href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('videojuegos.*') ? 'active fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Videojuegos') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link dropdown-item {{ request()->routeIs('videojuegos.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('videojuegos.index') }}">
                                <i class="bi bi-grid-3x3-gap-fill"></i>{{ __(' Vista Card') }}{{-- Cards --}}
                            </a>
                        </li>

                        <li>
                            <a class="nav-link dropdown-item {{ request()->routeIs('videojuegos.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('videojuegos.index') }}">
                                <i class="bi bi-table"></i>{{ __(' Vista Table') }}{{-- Tables --}}
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto">

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
