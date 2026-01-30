<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Nuevo Videojuego</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('videojuegos.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label>Título</label>
                            <input type="text" name="titulo" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div>
                            <label>Género</label>
                            <input type="text" name="genero" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label>Precio</label>
                                <input type="number" step="0.01" name="precio" class="w-full rounded-md border-gray-300" required>
                            </div>
                            <div>
                                <label>Stock</label>
                                <input type="number" name="stock" class="w-full rounded-md border-gray-300" required>
                            </div>
                        </div>
                        <div>
                            <label>Fecha de Lanzamiento</label>
                            <input type="date" name="fecha_lanzamiento" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div>
                            <label>¿Está en Oferta?</label>
                            <select name="en_oferta" class="w-full rounded-md border-gray-300">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Videojuego</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>