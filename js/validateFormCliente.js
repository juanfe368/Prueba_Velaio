/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datosFormCliente = new Object();
var respuestForm = new Object();
function validateFormLogin(){
    datosFormCliente.txtNombre = document.getElementById("txtNombre").value;
    datosFormCliente.txtApellido = document.getElementById("txtApellido").value;
    datosFormCliente.txtCedula = document.getElementById("txtCedula").value;
    datosFormCliente.txtCelular = document.getElementById("txtCelular").value;
    //datosFormCliente.txtTelefono = document.getElementById("txtTelefono").value;
    datosFormCliente.txtCorreo = document.getElementById("txtCorreo").value;
    respuestForm.respuest = false;
    if(datosFormCliente.txtNombre==""){
        alert("Ingrese el nombre del cliente por favor");
        document.getElementById("txtNombre").focus();
        respuestFormCliente()();
    }
    else if(datosFormCliente.txtApellido==""){
        alert("Ingrese el apellido del cliente por favor");
        document.getElementById("txtApellido").focus();
        respuestFormCliente()();
    }
    else if(datosFormCliente.txtCedula==""){
        alert("Ingrese la cedula del cliente por favor");
        document.getElementById("txtCedula").focus();
        respuestFormCliente()();
    }
    else if(datosFormCliente.txtCelular==""){
        alert("Ingrese el celular del cliente por favor");
        document.getElementById("txtCelular").focus();
        respuestFormCliente()();
    }
    else if(datosFormCliente.txtDireccion==""){
        alert("Ingrese la dirección del cliente por favor");
        document.getElementById("txtDireccion").focus();
        respuestFormCliente()();
    }
    else if(datosFormCliente.txtCorreo==""){
        alert("Ingrese el correo del cliente por favor");
        document.getElementById("txtCorreo").focus();
        respuestFormCliente()();
    }
    else{
        respuestForm.respuest = true;
        document.getElementById("hidValueForm").value = 1;
        respuestFormCliente()();
    }
}

function respuestFormCliente(){
    return respuestForm.respuest;
}

