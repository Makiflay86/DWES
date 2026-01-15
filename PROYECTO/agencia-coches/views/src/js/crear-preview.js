document.addEventListener('DOMContentLoaded', function() {
    const inputGaleria = document.getElementById('input-galeria');
    const previewContainer = document.getElementById('preview-galeria');

    if (inputGaleria) {
        inputGaleria.addEventListener('change', function() {
            previewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores
            
            // Convertimos la lista de archivos en un array y la recorremos
            Array.from(this.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail', 'me-2', 'mb-2');
                        img.style.width = '80px';
                        img.style.height = '60px';
                        img.style.objectFit = 'cover';
                        previewContainer.appendChild(img);
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
        });
    }
});