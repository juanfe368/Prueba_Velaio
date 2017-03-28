/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datosFormLogin = new Object();
var respuestForm = new Object();
function validateFormLogin(){
    datosFormLogin.inputUsuario = document.getElementById("inputUsuario").value;
    datosFormLogin.inputPassword = document.getElementById("inputPassword").value;
    respuestForm.respuest = false;
    if(datosFormLogin.inputUsuario==""){
        alert("Ingrese su nombre de usuario por favor");
        document.getElementById("inputUsuario").focus();
        respuestFormLogin();
    }
    else if(datosFormLogin.inputPassword==""){
        alert("Ingrese su clave por favor");
        document.getElementById("inputPassword").focus();
        respuestFormLogin();
    }
    else if(datosFormLogin.inputUsuario!=""&&datosFormLogin.inputPassword!=""){
        respuestForm.respuest = true;
        document.getElementById("hidVal").value = 1;
        respuestFormLogin();
    }
}

function respuestFormLogin(){
    return respuestForm.respuest;
}

