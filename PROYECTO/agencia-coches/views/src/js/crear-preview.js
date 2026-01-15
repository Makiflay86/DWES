document.addEventListener('DOMContentLoaded', function() {
    // --- 1. LÓGICA PARA LA IMAGEN DE PORTADA ---
    const inputPortada = document.getElementById('input-foto');
    const previewPortada = document.getElementById('preview-img');

    if (inputPortada && previewPortada) {
        inputPortada.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewPortada.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // --- 2. LÓGICA PARA LA GALERÍA EXTRA (CON BORRADO) ---
    const inputGaleria = document.getElementById('input-galeria-edit');
    const previewContainer = document.getElementById('preview-galeria-edit');
    let dt = new DataTransfer();

    if (inputGaleria && previewContainer) {
        inputGaleria.addEventListener('change', function() {
            for (let file of this.files) {
                dt.items.add(file);
            }
            actualizarVistaGaleria();
        });

        function actualizarVistaGaleria() {
            previewContainer.innerHTML = '';
            inputGaleria.files = dt.files;

            Array.from(dt.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'position-relative';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="img-thumbnail" style="width: 100px; height: 75px; object-fit: cover;">
                        <button type="button" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border-0">
                            <i class="bi bi-x"></i>
                        </button>
                    `;

                    div.querySelector('button').onclick = function() {
                        dt.items.remove(index);
                        actualizarVistaGaleria();
                    };
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }
    }
});