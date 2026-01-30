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

                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Título</th>
                                <th>Género</th>
                                <th>Precio</th>
                                <th style="width: 160px;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($videojuegos as $juego)
                            <tr>
                                <td>{{ $juego->titulo }}</td>
                                <td>{{ $juego->genero }}</td>
                                <td>{{ $juego->precio }}€</td>
                                <td>
                                    <a href="{{ route('videojuegos.edit', $juego) }}" class="btn btn-sm btn-success">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('videojuegos.destroy', $juego) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf 
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                                            <i class="bi bi-x-square"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
