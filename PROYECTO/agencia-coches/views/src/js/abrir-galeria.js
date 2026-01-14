function abrirGaleria(idCoche) 
{
    // Apuntamos a la acción del controlador
    fetch('index.php?action=getGaleriaJson&id=' + idCoche)
        .then(response => response.json())
        .then(data => 
        {
            const contenedor = document.getElementById('carouselContent');
            const carruselDiv = document.getElementById('carruselCoches');
            contenedor.innerHTML = ''; 

            data.forEach((img, index) => 
            {
                const activeClass = index === 0 ? 'active' : '';
                contenedor.innerHTML += `
                    <div class="carousel-item ${activeClass}">
                        <img src="data:image/jpeg;base64,${img.imagen}" class="d-block w-100 rounded">
                    </div>`;
            });

            carruselDiv.classList.remove('d-none');
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        });
}