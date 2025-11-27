/* 
    Validaciones para el formulario del examen
    
    Versión 3
    @autor: Francisco Aybar Romero
*/



document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormulario();
});
/* En vez de poner return onsubmit() en el html lo llamamos aquí */



document.getElementById('cadena1').addEventListener('change', function()
{
    limpiarError('cadena1');
});
/* En vez de poner return onchange() en el html lo llamamos aquí */

document.getElementById('cadena2').addEventListener('change', function()
{
    limpiarError('cadena2');
});



function validarFormulario() 
{
    var cadena1 = (document.getElementById('cadena1').value);
    var cadena2 = (document.getElementById('cadena2').value);
    
    
    

    var correcto = true; /* Hipótesis inicial */



    if (cadena1.trim() == "")
    {
        marcarError('cadena1');
        correcto = false;
    } 
    
    if (cadena2.trim() == "")
    {
        marcarError('cadena2');
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
function marcarErrorRadio(idInput, idHelp)
{
    document.getElementById(idHelp).style.visibility="visible";
    document.getElementById(idInput).style.borderColor="#ff0000";
}



function limpiarError(identificador)
{
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}
function limpiarErrorRadio(idInput, idHelp)
{
    document.getElementById(idHelp).style.visibility="hidden";
    document.getElementById(idInput).style.borderColor="#dee2e6";
}