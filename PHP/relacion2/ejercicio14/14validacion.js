/* 
    Validaciones para el formulario del ejercicio 14 de la relación 2
    
    Versión 1
    @autor: Francisco Aybar Romero
*/



document.getElementById('form1').addEventListener('submit', function(event)
{
    event.preventDefault();
    validarFormularioNota();
});

document.getElementById('nota').addEventListener('change', function()
{
    limpiarError('nota');
});



function validarFormularioNota() 
{
    var nota = parseFloat(document.getElementById('nota').value);
    /* Deben ser enteros, numéricos, entre 1 y 10 y tener algo */

    var correcto = true; /* Hipótesis inicial */

    if (!Number.isInteger(nota) || nota < 1 || nota > 10)
    {
        marcarError('nota'); /* Le paso el ID de cada campo a una función */
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
/* Si el dato es incorrecto activa un texto que estaba previamente oculto y lo pone en rojo */



function limpiarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}
/* Al volver a escribir algo vuelve a esconderse el texto de error y cambia el color */