/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datosFormCliente = new Object();
var respuestForm = new Object();
function validateFormCuenta(){
    datosFormCliente.txtNombre = document.getElementById("txtNombre").value;
    datosFormCliente.txtNumCup = document.getElementById("txtNumCup").value;
    datosFormCliente.descipArea = document.getElementById("descipArea").value;
    datosFormCliente.txtHorario = document.getElementById("txtHorario").value;
    datosFormCliente.txtProfesor = document.getElementById("txtProfesor").value;
    respuestForm.respuest = false;
    if(datosFormCliente.txtCedula==""){
        alert("Ingrese la cedula a asociar");
        document.getElementById("txtCedula").focus();
        respuestFormCuenta()();
    }
    else if(datosFormCliente.txtNumMonto==""){
        alert("Ingrese un monto del cliente");
        document.getElementById("txtNumMonto").focus();
        respuestFormCuenta()();
    }
    else{
        respuestForm.respuest = true;
        document.getElementById("hidValueForm").value = 1;
        respuestFormEstudiante()();
    }
}

function respuestFormCuenta(){
    return respuestForm.respuest;
}

