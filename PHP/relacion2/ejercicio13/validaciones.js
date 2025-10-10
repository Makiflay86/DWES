/* 
    Validaciones para el formulario del ejercicio 13 de la relación 2
    
    Versión 1
    @autor: Francisco Aybar Romero
*/

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

    var correcto = true; /* Hipótesis inicial */

    if (!Number.isInteger(nota1) || nota1 < 1 || nota1 > 10)
    {
        correcto = false;
        alert("La nota 1 debe ser entera entre 1 y 10")
    }
    if (!Number.isInteger(nota2) || nota2 < 1 || nota2 > 10)
    {
        correcto = false;
        alert("La nota 2 debe ser entera entre 1 y 10")
    }
    if (!Number.isInteger(falta) || falta < 0)
    {
        correcto = false;
        alert("La falta debe ser entera mayor que 0")
    }
    if (nombre.trim() == "")
    {
        correcto = false;
        alert("El nombre es obligatorio");
    }

    return correcto
    /* Si han ido bien todas la comprobaciones, se devuelve al punto de llamada TRUE sino, 
       se devuelve FALSE */
    


}