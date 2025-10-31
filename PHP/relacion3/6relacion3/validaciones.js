/* 
    Validaciones para el formulario del ejercicio 5 de la relación 3
    
    Versión 2
    @autor: Francisco Aybar Romero
*/



document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormularioNota();
});
/* En vez de poner return onsubmit() en el html lo llamamos aquí */



document.getElementById('nota1').addEventListener('change', function()
{
    limpiarError('nota1');
});
/* En vez de poner return onchange() en el html lo llamamos aquí */

document.getElementById('nota2').addEventListener('change', function()
{
    limpiarError('nota2');
});

document.getElementById('falta').addEventListener('change', function()
{
    limpiarError('falta');
});

document.getElementById('nombre').addEventListener('change', function()
{
    limpiarError('nombre');
});

document.getElementById('correo').addEventListener('change', function()
{
    limpiarError('correo');
});

document.getElementById('docIdDni').addEventListener('change', function()
{
    limpiarError('docIdDni');
});


function validarFormularioNota() 
{
    var tiradas = parseInt(document.getElementById('tiradas').value);
    
    var correcto = true; /* Hipótesis inicial */

    if (!Number.isInteger(tiradas))
    {
        marcarError('tiradas');
        correcto = false;
    }
    
    

    if (correcto) document.getElementById('form1').submit();
    /* Si han ido bien todas la comprobaciones, se devuelve al punto de llamada TRUE sino, 
       se devuelve FALSE */
}



function marcarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="visible";
    document.getElementById(identificador).style.borderColor="#ff0000";
}



function limpiarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}