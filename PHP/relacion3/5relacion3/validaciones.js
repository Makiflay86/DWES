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
    limpiarErrorRadio('docIdDni', 'docIdHelp');
});

document.getElementById('docIdNie').addEventListener('change', function()
{
    limpiarErrorRadio('docIdNie', 'docIdHelp');
});

document.getElementById('docIdTie').addEventListener('change', function()
{
    limpiarErrorRadio('docIdTie', 'docIdHelp');
});



const radioDni = document.getElementById('dni');
const radioNie = document.getElementById('nie');
const radioTie = document.getElementById('tie');
const inputDni = document.getElementById('docIdDni');
const inputNie = document.getElementById('docIdNie');
const inputTie = document.getElementById('docIdTie');

function actualizarVisibilidadDocumento() 
{
    inputDni.hidden = true;
    inputNie.hidden = true;
    inputTie.hidden = true;

    if (radioDni.checked) 
    {
        inputDni.hidden = false;

    } else if (radioNie.checked) 
    {
        inputNie.hidden = false;

    } else if (radioTie.checked) 
    {
        inputTie.hidden = false;
    }
}

radioDni.addEventListener('change', actualizarVisibilidadDocumento);
radioNie.addEventListener('change', actualizarVisibilidadDocumento);
radioTie.addEventListener('change', actualizarVisibilidadDocumento);



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
    if (correo.trim() == "" || !/\S+@\S+\.[a-zA-Z]+/.test(correo))
    {
        marcarError('correo');
        correcto = false;
    }

    
    /* Validación del correo, dependiendo de cual eliga */
    if (dni) 
    {
        const dniRegex = /^\d{8}[a-zA-Z]$/;
        if (!dniRegex.test(docIdDni)) 
        {
            marcarErrorRadio('docIdDni', 'docIdHelp');
            correcto = false;

        } else 
        {
            const numero = docIdDni.substr(0, 8);
            const letra = docIdDni.substr(8, 1).toUpperCase();
            const letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
            const letraCalculada = letrasValidas.charAt(numero % 23);

            if (letra !== letraCalculada) 
            {
                marcarErrorRadio('docIdDni', 'docIdHelp');
                correcto = false;
            }
        }
    } else if (nie) 
    {
        const nieRegex = /^[XYZxyz]\d{7}[a-zA-Z]$/;
        if (!nieRegex.test(docIdNie)) 
        {
            marcarErrorRadio('docIdNie', 'docIdHelp');
            correcto = false;
        } else 
        {
            const nieUpper = docIdNie.toUpperCase();
            let primeraLetra = nieUpper.charAt(0);
            let numeroStr = nieUpper.substr(1, 7);

            if (primeraLetra === 'X') 
            {
                numeroStr = '0' + numeroStr;

            } else if (primeraLetra === 'Y') 
            {
                numeroStr = '1' + numeroStr;

            } else // Z
            { 
                numeroStr = '2' + numeroStr;
            }
            
            const letra = nieUpper.charAt(8);
            const letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
            const letraCalculada = letrasValidas.charAt(parseInt(numeroStr) % 23);

            if (letra !== letraCalculada) 
            {
                marcarErrorRadio('docIdNie', 'docIdHelp');
                correcto = false;
            }
        }
    } else // TIE
    { 
        if (docIdTie.trim() == "") 
        {
            marcarErrorRadio('docIdTie', 'docIdHelp');
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