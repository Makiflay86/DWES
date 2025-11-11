/* En vez de poner return onsubmit() en el html lo llamamos aquí */
document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormulario();
});



/* Esto limpia el texto cuando salto un error */
document.getElementById('idusuario').addEventListener('change', function()
{
    limpiarError('idusuario');
});

document.getElementById('password').addEventListener('change', function()
{
    limpiarError('password');
});



/* Validar el formulario */
function validarFormulario() 
{
    var idusuario = document.getElementById('idusuario').value.trim();
    var password = document.getElementById('password').value.trim();

    var correcto = true; 

    if (idusuario == "" )
    {
        marcarError('idusuario');
        correcto = false;
    }

    if (password == "")
    {
        marcarError('password');
        correcto = false;
    }
    
    

    if (correcto) document.getElementById('form1').submit();
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


/* Poder elegir en ver o no la contraseña */
function togglePassword() 
{
  const input = document.getElementById("password");
  input.type = input.type === "password" ? "text" : "password";
}