document.addEventListener('DOMContentLoaded', function() {
const inputFoto = document.getElementById('input-foto');
const previewImg = document.getElementById('preview-img');

// Solo se ejecuta si los elementos existen en la página
if (inputFoto && previewImg) {
    inputFoto.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
}

// Lógica para la galería múltiple en edición
const inputGaleriaEdit = document.getElementById('input-galeria-edit');
const previewGaleriaEdit = document.getElementById('preview-galeria-edit');

if (inputGaleriaEdit && previewGaleriaEdit) {
    inputGaleriaEdit.addEventListener('change', function() {
        previewGaleriaEdit.innerHTML = ''; 
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style.width = '100px';
                img.style.height = '75px';
                img.style.objectFit = 'cover';
                previewGaleriaEdit.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });
}
});