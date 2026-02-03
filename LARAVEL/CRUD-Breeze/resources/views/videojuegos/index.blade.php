<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark">
            {{ __('Lista de Videojuegos') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="text-center">
                        <a href="{{ route('videojuegos.create') }}" class="btn btn-primary mb-3">
                            <i class="bi bi-controller"></i>
                            Añadir Juego
                        </a>
                    </div>

                    @if ($vista === 'tabla')
                        @include('videojuegos.view-table')
                    @else
                        @include('videojuegos.view-cards')
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
