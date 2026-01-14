document.addEventListener('DOMContentLoaded', function () 
{
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    const modalImg = document.getElementById('modalImg');

    // Seleccionamos todas las imágenes con la clase 'img-expandir'
    document.querySelectorAll('.img-expandir').forEach(img => 
    {
        img.addEventListener('click', function () 
        {
            // Pasamos la fuente de la imagen pequeña a la del modal
            modalImg.src = this.src;
            // Mostramos el modal
            modal.show();
        });
    });
});