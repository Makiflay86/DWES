function abrirGaleria(idCoche, fotoPortada) {
    const mainImg = document.getElementById('mainGalleryImg');
    const thumbContainer = document.getElementById('thumbContainer');
    
    // 1. Limpieza total inmediata para evitar "fantasmas"
    mainImg.src = fotoPortada; // Por defecto mostramos la portada
    thumbContainer.innerHTML = ''; 

    fetch('index.php?action=getGaleriaJson&id=' + idCoche)
        .then(response => response.json())
        .then(data => {
            // 2. Si hay galería extra, añadimos las miniaturas
            if (data && data.length > 0) {
                // Añadimos la portada como primera miniatura
                thumbContainer.innerHTML += `
                    <img src="${fotoPortada}" class="img-thumbnail" 
                         style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                         onmouseover="document.getElementById('mainGalleryImg').src='${fotoPortada}'">`;

                // Añadimos el resto de fotos de la tabla de galería
                data.forEach((img) => {
                    const imgSrc = "data:image/jpeg;base64," + img.imagen;

                    thumbContainer.innerHTML += `
                        <img src="${imgSrc}" class="img-thumbnail" 
                             style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                             onmouseover = "document.getElementById('mainGalleryImg').src='${imgSrc}'; this.style.borderColor='#0d6efd';" 
                             onmouseout = "this.style.borderColor='#dee2e6';">`;
                });
            }

            // 3. Abrir el modal centrado
            const myModal = new bootstrap.Modal(document.getElementById('imageModal'));
            myModal.show();
        })
        .catch(err => {
            console.error("Error cargando galería:", err);
            // Si falla la red, al menos ya tenemos la fotoPortada puesta arriba
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        });
}