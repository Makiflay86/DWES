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
    var nota1 = parseFloat(document.getElementById('nota1').value);
    var nota2 = parseFloat(document.getElementById('nota2').value);
    /* Deben ser enteros, numéricos, entre 1 y 10 y tener algo */
    
    var falta = parseFloat(document.getElementById('falta').value);
    /* Igual salvo que puede ser 0 */
    
    var nombre = document.getElementById('nombre').value;
    /* No debe estar vació */

    var correo = document.getElementById('correo').value;
    /* Debe tener el formato de un email(correo) */

    var docIdDni = document.getElementById('docIdDni').value;
    var docIdNie = document.getElementById('docIdNie').value;
    var docIdTie = document.getElementById('docIdTie').value;

    var dni = document.getElementById('dni').checked;
    var nie = document.getElementById('nie').checked;
    /* var tie = document.getElementById('tie').checked; No hace falta*/



    var correcto = true; /* Hipótesis inicial */

    if (!Number.isInteger(nota1) || nota1 < 1 || nota1 > 10)
    {
        marcarError('nota1'); /* Le paso el ID de cada campo a una función */
        correcto = false;
    }
    if (!Number.isInteger(nota2) || nota2 < 1 || nota2 > 10)
    {
        marcarError('nota2');
        correcto = false;
    }
    if (!Number.isInteger(falta) || falta < 0)
    {
        marcarError('falta');
        correcto = false;
    }
    if (nombre.trim() == "")
    {
        marcarError('nombre');
        correcto = false;
    }
    if (docIdDni.trim() == "" || docIdNie.trim() == "" || docIdTie.trim() == "")
    {
        if (dni)
        {
            marcarError('docId');
            correcto = false;

        } else  if(nie)
        {
            marcarError('docId');
            correcto = false;

        } else 
        {
            marcarError('docId');
            correcto = false;
        }
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