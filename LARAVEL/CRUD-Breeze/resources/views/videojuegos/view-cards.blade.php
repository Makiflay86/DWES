<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach ($videojuegos as $juego): ?>
        <div class="col">
            <div class="card h-100 shadow-sm border-0 card-hover">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/86/Collecting_wood_in_Rust.jpeg/330px-Collecting_wood_in_Rust.jpeg" class="card-img-top" style="height: 200px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $juego->titulo }}</h5>
                    <p class="card-text text-muted small">
                        <span class="badge bg-light text-dark border">{{ $juego->genero }}</span>
                        <span class="ms-2">{{ $juego->precio }} €</span>
                    </p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between pb-3">
                    <a href="{{ route('videojuegos.edit', $juego) }}" class="btn btn-sm btn-success">
                        Editar
                    </a>

                    <form action="{{ route('videojuegos.destroy', $juego) }}" 
                            method="POST" 
                            class="d-inline">
                        @csrf 
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>