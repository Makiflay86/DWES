// -------------------
// --- MODO OSCURO ---
// -------------------

function toggleTheme() 
{
    const body = document.body;
    const card = document.getElementById('login-card');
    const icon = document.getElementById('theme-icon');
    const toggleIconLogin = document.getElementById("toggleIconLogin");

    body.classList.toggle('bg-dark');
    body.classList.toggle('text-light');

    card.classList.toggle('bg-dark');
    card.classList.toggle('text-light');
    card.classList.toggle('border-light');

    toggleIconLogin.classList.toggle("text-light");

    if (icon.classList.contains('bi-moon-fill')) 
    {
        icon.classList.replace('bi-moon-fill', 'bi-sun-fill');

    } else 
    {
        icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
    }
}