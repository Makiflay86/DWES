<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow">
    <div class="container-fluid px-lg-5"> 
        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/logo.jpg') }}" alt="logo" width="64" height="auto">
        </a>
        {{-- Menú --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Vistas videojuegos --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto gap-2 py-2 py-lg-0">
                <li>
                    <a class="nav-link dropdown-item {{ request('vista') === 'cards' ? 'active fw-bold' : '' }}"
                        href="{{ route('videojuegos.index', ['vista' => 'cards']) }}">
                        <i class="bi bi-grid"></i> Vista Cards
                    </a>
                </li>

                <li>
                    <a class="nav-link dropdown-item {{ request('vista') === 'tabla' ? 'active fw-bold' : '' }}"
                        href="{{ route('videojuegos.index', ['vista' => 'tabla']) }}">
                        <i class="bi bi-table"></i> Vista Tabla
                    </a>
                </li>
            </div>
            {{-- Usuario --}}
            <div class="d-flex align-items-center ms-lg-3 py-2 py-lg-0">
                <i class="bi bi-person-circle me-1"></i>
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
                                <button class="dropdown-item text-danger"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>
            </div>
        </div>

    </div>
</nav>