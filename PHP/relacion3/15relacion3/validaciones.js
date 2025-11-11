/* En vez de poner return onsubmit() en el html lo llamamos aquí */
document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormulario();
});



/* Esto limpia el texto cuando salto un error */
document.getElementById('texto').addEventListener('change', function()
{
    limpiarError('texto');
});




/* Validar el formulario */
function validarFormulario() 
{
    var texto = document.getElementById('texto').value.trim();
    var textoFloat = parseFloat(texto);

    var correcto = true; 

    if (texto.length == 0 || isNaN(textoFloat) || textoFloat < 0)
    {
        marcarError('texto');
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


