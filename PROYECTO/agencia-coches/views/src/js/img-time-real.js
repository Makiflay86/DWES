const inputFoto = document.getElementById('input-foto');
const previewImg = document.getElementById('preview-img');

inputFoto.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result; // Cambia la imagen en tiempo real
        }
        reader.readAsDataURL(file);
    }
});