let lastScrollTop = 0;
const navbar = document.getElementById("mainNavbar");

window.addEventListener("scroll", function() 
{
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    // NUEVO: Si la página es bajita (como el formulario), no hagas nada
    // Solo actúa si el contenido es al menos 300px más grande que la pantalla
    if (document.documentElement.scrollHeight < window.innerHeight + 300) 
    {
        navbar.classList.remove("nav-fixed-up", "nav-hidden");
        return; 
    }

    if (scrollTop <= 0) 
    {
        navbar.classList.remove("nav-fixed-up", "nav-hidden");
        return;
    }

    if (scrollTop > 50) 
    {
        if (scrollTop < lastScrollTop) 
        {
            navbar.classList.add("nav-fixed-up");
            navbar.classList.remove("nav-hidden");

        } else 
        {
            navbar.classList.add("nav-hidden");
            navbar.classList.remove("nav-fixed-up");
        }
    }
    
    lastScrollTop = scrollTop;
}, false);