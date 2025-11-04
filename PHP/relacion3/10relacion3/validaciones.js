document.getElementById('form1').addEventListener('submit', function(event) 
{
    event.preventDefault();
    validarFormulario();
});
/* En vez de poner return onsubmit() en el html lo llamamos aquí */



document.getElementById('texto').addEventListener('change', function()
{
    limpiarError('texto');
});



function validarFormulario() 
{
    var texto = document.getElementById('texto');
    
    var correcto = true; 

    if (texto.value.length == 0)
    {
        marcarError('texto');
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