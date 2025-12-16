// ===============================================
// ====== LÓGICA DE DARK/LIGHT MODE (THEME) ======
// ===============================================

// Se ejecuta cuando el HTML ha terminado de cargar
document.addEventListener('DOMContentLoaded', () => {
    const storedTheme = localStorage.getItem('theme');
    
    if (storedTheme) {
        // Si hay un tema guardado, lo aplicamos
        applyTheme(storedTheme);
    } else {
        // Si no hay tema guardado, usamos la preferencia del sistema
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(systemPrefersDark ? 'dark' : 'light');
    }
});

/** Aplica el tema al body y actualiza el icono */
function applyTheme(theme) {
    const icon = document.getElementById('theme-icon');
    const body = document.body;
    
    // Aplica el atributo data-bs-theme que usa el CSS para cambiar colores
    body.setAttribute('data-bs-theme', theme);

    // Actualiza el icono (luna para oscuro, sol para claro)
    if (theme === 'dark') {
        icon.classList.remove('bi-sun-fill');
        icon.classList.add('bi-moon-fill');
    } else {
        icon.classList.remove('bi-moon-fill');
        icon.classList.add('bi-sun-fill');
    }
}

/** Alterna el tema al hacer clic en el botón */
function toggleTheme() {
    // Lee el tema actual del atributo del body
    const currentTheme = document.body.getAttribute('data-bs-theme') || 'light';
    
    // El nuevo tema es el opuesto
    const newTheme = (currentTheme === 'dark') ? 'light' : 'dark';
    
    // Aplicar y guardar la elección en el almacenamiento local del navegador
    applyTheme(newTheme);
    localStorage.setItem('theme', newTheme);
}