document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormularioNota();
});
/* En vez de poner return onsubmit() en el html lo llamamos aquí */



document.getElementById('tiradas').addEventListener('change', function()
{
    limpiarError('tiradas');
});



function validarFormularioNota() 
{
    var tiradas = parseInt(document.getElementById('tiradas').value);
    
    var correcto = true; 

    if (!Number.isInteger(tiradas))
    {
        marcarError('tiradas');
        correcto = false;
    }
    
    

    if (correcto) document.getElementById('form1').submit();
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