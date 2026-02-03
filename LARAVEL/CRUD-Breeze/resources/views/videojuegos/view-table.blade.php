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
            <td>{{ $juego->precio == 0 ? 'Gratis' : number_format($juego->precio, 2, ',', '.') . " €" }}</td>
            <td>
                <a href="{{ route('videojuegos.edit', ['videojuego' => $juego->id, 'vista' => $vista]) }}" class="btn btn-sm btn-success">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ route('videojuegos.destroy', $juego) }}" 
                        method="POST" 
                        class="d-inline">
                    @csrf 
                    @method('DELETE')

                    <input type="hidden" name="vista" value="{{ $vista }}">

                    <button type="submit" class="btn btn-sm btn-danger ms-1">
                        <i class="bi bi-x-square"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>