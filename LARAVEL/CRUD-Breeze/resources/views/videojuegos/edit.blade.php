<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Videojuego: {{ $videojuego->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('videojuegos.update', $videojuego) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Título</label>
                        <input type="text" name="titulo" value="{{ $videojuego->titulo }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Género</label>
                        <input type="text" name="genero" value="{{ $videojuego->genero }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Precio (€)</label>
                            <input type="number" step="0.01" name="precio" value="{{ $videojuego->precio }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Stock</label>
                            <input type="number" name="stock" value="{{ $videojuego->stock }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Fecha de Lanzamiento</label>
                        <input type="date" name="fecha_lanzamiento" value="{{ $videojuego->fecha_lanzamiento }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">¿Está en Oferta?</label>
                        <select name="en_oferta" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="0" {{ $videojuego->en_oferta == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $videojuego->en_oferta == 1 ? 'selected' : '' }}>Sí</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md shadow transition">
                            Actualizar Datos
                        </button>
                        <a href="{{ route('videojuegos.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Cancelar y volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>