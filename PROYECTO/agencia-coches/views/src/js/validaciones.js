document.addEventListener('DOMContentLoaded', function() 
{
    /* En vez de poner return onsubmit() en el html lo llamamos aquí */
    document.getElementById('form1').addEventListener('submit', function(event) 
    {
        event.preventDefault();
        validarFormulario();
    });
    document.getElementById('form2').addEventListener('submit', function(event) 
    {
        event.preventDefault();
        validarFormularioSignUp();
    });
});



/* Esto limpia el texto cuando salto un error */
/* login */
document.getElementById('login_email').addEventListener('change', function()
{
    limpiarError('login_email');
});

document.getElementById('login_password').addEventListener('change', function()
{
    limpiarError('login_password');
});

/* sign-up */
document.getElementById('register_name').addEventListener('change', function()
{
    limpiarError('register_name');
});

document.getElementById('register_apellidos').addEventListener('change', function()
{
    limpiarError('register_apellidos');
});

document.getElementById('register_email').addEventListener('change', function()
{
    limpiarError('register_email');
});

document.getElementById('register_password').addEventListener('change', function()
{
    limpiarError('register_password');
});

document.getElementById('confirm_password').addEventListener('change', function()
{
    limpiarError('confirm_password');
});


/* Validar el formulario login */
function validarFormulario() 
{
    let login_email = document.getElementById('login_email').value;
    let login_password = document.getElementById('login_password').value;

    let correcto = true; 

    /* Validar email */
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (login_email == "" || !regexEmail.test(login_email))
    {
        document.getElementById('login_emailHelp').innerText = "Introduce un correo electrónico válido.";
        marcarError('login_email');
        correcto = false;
    }

    /* Validar password */
    /* 8-15 caracteres, 1 minúscula, 1 mayúscula, 1 símbolo (#$%&*) */
    /* Bloquea: ' " \ / < > = ( ) */
    const regexClave = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%\&*])[^'\"\\\/<>=()]{8,15}$/;
    if (login_password == "" || !regexClave.test(login_password))
    {
        document.getElementById('login_passwordHelp').innerText = "La clave debe tener 8-15 caracteres, incluir mayúsculas, minúsculas, un símbolo (#$%&*) y no usar caracteres prohibidos (' \" \\ / < > = ( ) ).";
        marcarError('login_password');
        correcto = false;
    }
    
    

    if (correcto) document.getElementById('form1').submit();
}

/* Validar el formulario sign-up */
function validarFormularioSignUp() 
{
    let register_name = document.getElementById("register_name").value;
    let register_apellidos = document.getElementById("register_apellidos").value;
    let register_email = document.getElementById('register_email').value;
    let register_password = document.getElementById('register_password').value;
    let confirm_password = document.getElementById('confirm_password').value;

    let correcto2 = true; 

    /* Validar nombre */
    if (register_name.trim() == "")
    {
        document.getElementById('register_nameHelp').innerText = "El nombre es obligatorio.";
        marcarError('register_name');
        correcto2 = false;
    }

    /* Validar apellidos */
    if (register_apellidos.trim() == "")
    {
        document.getElementById('register_apellidosHelp').innerText = "El apellido es obligatorio.";
        marcarError('register_apellidos');
        correcto2 = false;
    }

    /* Validar email */
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (register_email == "" || !regexEmail.test(register_email))
    {
        document.getElementById('register_emailHelp').innerText = "Introduce un correo electrónico válido.";
        marcarError('register_email');
        correcto2 = false;
    }

    /* Validar password */
    /* 8-15 caracteres, 1 minúscula, 1 mayúscula, 1 símbolo (#$%&*) */
    /* Bloquea: ' " \ / < > = ( ) */
    const regexClave = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%\&*])[^'\"\\\/<>=()]{8,15}$/;
    if (register_password == "" || !regexClave.test(register_password))
    {
        document.getElementById('register_passwordHelp').innerText = "La clave debe tener 8-15 caracteres, incluir mayúsculas, minúsculas, un símbolo (#$%&*) y no usar caracteres prohibidos (' \" \\ / < > = ( ) ).";
        marcarError('register_password');
        correcto2 = false;
    }

    /* Validar confirm passsword */
    if (confirm_password === "") 
    {
        document.getElementById('confirm_passwordHelp').innerText = "Por favor, confirma tu contraseña.";
        marcarError('confirm_password');
        correcto2 = false;

    } else if (confirm_password !== register_password) 
    {
        // Comprobamos si es igual a la variable que ya tienes
        document.getElementById('confirm_passwordHelp').innerText = "Las contraseñas no coinciden.";
        marcarError('confirm_password');
        correcto2 = false;

    } else 
    {
        // Si es correcto, limpiamos el error
        document.getElementById('confirm_passwordHelp').innerText = "";
        limpiarError('confirm_password'); // Asegúrate de tener esta función o similar
    }
    
    

    /* if (correcto2) document.getElementById('form2').submit(); */
    if (correcto2) {
        console.log("Validación exitosa, enviando...");
        document.getElementById('form2').submit();
    } else {
        console.log("Validación fallida, deteniendo envío.");
    }
}



/* Si el validarFormulario da error cambia el color del input del formulario a rojo y muestra un mensaje */
function marcarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="visible";
    document.getElementById(identificador).style.borderColor="#ff0000";
}



/* Cambiar el colo del input al default */
function limpiarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}
