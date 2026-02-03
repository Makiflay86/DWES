<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark">Crear Nuevo Videojuego</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{ route('videojuegos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="vista" value="{{ $vista }}">

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <input type="text" name="genero" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" step="0.01" name="precio" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha de Lanzamiento</label>
                            <input type="date" name="fecha_lanzamiento" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">¿Está en Oferta?</label>
                            <select name="en_oferta" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="imagen" class="form-control">
                        </div>

                        <div class="d-flex align-items-center gap-3 pt-3 border-top">
                            <button type="submit" class="btn btn-primary">
                                Guardar Videojuego
                            </button>
                            <a href="{{ route('videojuegos.index', [ 'vista' => $vista]) }}" class="btn btn-danger">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
