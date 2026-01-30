<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Videojuegos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('videojuegos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Añadir Juego</a>
                
                <table class="min-w-full mt-4">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Título</th>
                            <th class="border px-4 py-2">Género</th>
                            <th class="border px-4 py-2">Precio</th>
                            <th class="border px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videojuegos as $juego)
                        <tr>
                            <td class="border px-4 py-2">{{ $juego->titulo }}</td>
                            <td class="border px-4 py-2">{{ $juego->genero }}</td>
                            <td class="border px-4 py-2">{{ $juego->precio }}€</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('videojuegos.edit', $juego) }}" class="text-green-600">Editar</a>
                                <form action="{{ route('videojuegos.destroy', $juego) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>