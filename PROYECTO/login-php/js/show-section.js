// ===============================================
// === LÓGICA DE CAMBIO DE SECCIÓN (LOGIN/REG) ===
// ===============================================

function showSection(sectionId)
{
    const loginSection = document.getElementById('login-section');
    const registerSection = document.getElementById('register-section');
    const title = document.getElementById('form-title');
    
    // Ocultar ambas secciones
    loginSection.style.display = 'none';
    registerSection.style.display = 'none';

    // Mostrar la sección solicitada y actualizar el título
    if (sectionId === 'login-section') 
    {
        loginSection.style.display = 'block';
        title.textContent = 'Iniciar Sesión';

    } else if (sectionId === 'register-section') 
    {
        registerSection.style.display = 'block';
        title.textContent = 'Registro de Usuario';
    }
}