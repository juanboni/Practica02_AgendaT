/*VALIDACION DE TODOS LOS CAMPOS QUE ESTEN INGRESADOS*/
function validarCamposObligatorios(){
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text' ) {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML= '<br>La cedula esta vacia'
            }
            if (elemento.id == 'nombres') {
                document.getElementById('mensajeNombre').innerHTML= '<br>El nombre esta vacia'
            }
            if (elemento.id == "apellidos") {
                document.getElementById("mensajeApellido").innerHTML = "<br>El Apellido esta vacia";
            }
            if (elemento.id == "fecha") {
                document.getElementById("mensajeFecha").innerHTML = "<br>La fecha esta vacia";
            }
            if (elemento.id == "direccion") {
                document.getElementById("mensajeDireccion").innerHTML = "<br>La direccion esta vacia";
            }
            if (elemento.id == "telefono") {
                document.getElementById("mensajeTelefono").innerHTML = "<br>El telefono esta vacia";
            }
            elemento.style.border = '2px red solid'
            elemento.className = 'error'
            bandera= false
        } 
        if (elemento.value == "" && elemento.type == "password") {
            if (elemento.id == "password") {
                document.getElementById("mensajePassword").innerHTML = "<br>La contraseña esta vacia";
            }
            elemento.style.border = "2px red solid";
            elemento.className = "error";
            bandera = false;
        }  
        if (elemento.value == "" && elemento.type == "date") {
            if (elemento.id == "fecha") {
                document.getElementById("mensajeFecha").innerHTML = "<br>La fecha esta vacia";
            }
            elemento.style.border = "2px red solid";
            elemento.className = "error";
            bandera = false;
        } 
        
        if (elemento.value == "" && elemento.type == "email") {
            if (elemento.id == "correo") {
                document.getElementById("mensajeEmail").innerHTML = "<br>El mail esta vacio";
            }
            elemento.style.border = "2px red solid";
            elemento.className = "error";
            bandera = false;
        } 
    }
    if (!bandera) {
        alert('Error: revisar los comentarios')
    }

    return bandera
}


function validarLetras(elemento){
    if (elemento.value.length>0)
    {
        var miAscci=elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscci)
        if ((miAscci >=65 && miAscci <=90)||(miAscci >=97 && miAscci <=122)||miAscci ==32 ) 
        {
            return true
        }else
        {
            elemento.value= elemento.value.substring(0, elemento.value.length-1)
            return false
        }
    }else{
            return true
    }   
}


/*VALIDACION DEL CAMPO CEDULA*/
function validarCedula() {
    var ide = false;
    let elemento = document.getElementById("cedula");
    let array = [];
    if (elemento.value.length == 10) {
        for (let i = 0; i < elemento.value.length; i++) {
            array[i] = parseInt(elemento.value.charAt(i));
        }
        if (array[2] <= 6 && array[2] >= 0) {
            let comprobar = [2, 1, 2, 1, 2, 1, 2, 1, 2];
            var suma = 0;
            for (i = 0; i < comprobar.length; i++) {
                array[i] *= comprobar[i];
                if (array[i] >= 10) {
                    array[i] -= 9;
                }
                suma += array[i];
            }
            suma += array[i];
            suma %= 10;
            if (suma == 0) {
                ide = true;
                document.getElementById("mensajeCedula").innerHTML = "";
                
                return true;
            } else {
                ide = false;
                
                document.getElementById("mensajeCedula").innerHTML = "<br>Numero de cedula invalida";
            }
        }
    } else {
        ide = false;
        
        document.getElementById("mensajeCedula").innerHTML =
            "<br>Numero de cedula invalida";
    }
    return false;
}


//Valida que solo sea numero en la cedula
function validarNumero(elemento) {
    if (elemento.value.length>0)
    {
        var miAscci=elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscci)
        if (miAscci >=48 && miAscci <=57) 
        {
            return true
        }else
        {
            elemento.value= elemento.value.substring(0, elemento.value.length-1)
            return false
        }
    }else{
            return true
    }   
}

//Valida que ingrese en el campo nombre : 2 nombres
function validarNombre() {
   var  name = false;
    var elemento = document.getElementById("nombre");
    if (elemento.value.length > 2) {
        name = true;
        document.getElementById("mensajeNombre").innerHTML = "";
        
        return true;
    } else {
        
        document.getElementById("mensajeNombre").innerHTML ="<br>Ingrese sus dos nombres";
    }
    return false;
}

//Valida que ingrese en el campo telefono : ingrese solo numero y un maximo de 10
function validarNumerotel(elemento) {
    if (elemento.value.length>0)
    {
        var miAscci=elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscci)
        if ((elemento.value.length<=10)&&(miAscci >=48 && miAscci <=57)) 
        {
            return true
        }else
        {
            elemento.value= elemento.value.substring(0, elemento.value.length-1)
            return false
        }
    }else{
            return true
    }   
}



//valida el correo Se considera un correo válido, 
//cuando comienza por tres o más valores alfanuméricos, 
//luego un @, seguido por la extensión “ups.edu.ec” o “est.ups.edu.ec”.
function validarCorreo() {
    var email = false;
    var elemento = document.getElementById("correo");
    var correo = elemento.value.split("@");
    if (correo.length == 2) {
    
        
        if (correo[0].length < 3) {
            document.getElementById("mensajeEmail").innerHTML =
                "<br>Direccion no valido @ups.edu.ec <br>Direccion no valido @est.ups.edu.ec" ;
                
            return false;
        }
        if (correo[1].localeCompare("est.ups.edu.ec") == "0" || correo[1].localeCompare("ups.edu.ec") == "0") {
            document.getElementById("mensajeEmail").innerHTML = "";
        } else {
            document.getElementById("mensajeEmail").innerHTML =
                "<br>@ups.edu.ec <br> @est.ups.edu.ec";
            return false;
        }
    } else {
        document.getElementById("mensajeEmail").innerHTML =
            "<br>Direccion no valido @ups.edu.ec <br>Direccion no valido @est.ups.edu.ec";
            
        return false;
    }
    email = true;
    
    return true;
}

/*Se debe validar que la contraseña ingresada 
tenga mínimo 8 caracteres, además, debe incluir al menos: 
una letra mayúscula, una letra minúscula y un carácter especial (@, _, $)*/

function validarcontrasena(){
    var clave = false;
    var elemento = document.getElementById("contrasena");
    if (elemento.value.length >= 8) {
        document.getElementById("mensajePassword").innerHTML = "";
        var booChar = false;
        var booMayus = false;
        var booMinus = false;
        for (var i = 0; i < elemento.value.length; i++) {
            var codigo = elemento.value.charCodeAt(i);
            //codigo= _ @ $
            if ((codigo == 95 || codigo == 64 || codigo == 36) && !booChar)
            {
                booChar = true;
            }
            else if (codigo > 64 && codigo < 91 && !booMayus)
            {
                booMayus = true;
            }
            else if (codigo > 96 && codigo < 123 && !booMinus) 
            {
                booMinus = true;
            }
        }
        if (!booChar)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar un caracter especial  #$@ " ;
        if (!booMayus)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar una Mayuscula";
        if (!booMinus)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar una minuscula";
    } else {
        document.getElementById("mensajePassword").innerHTML =
            "<br>Contraseña debe tener minimo 8 caracteres";
        return false;
    }
    if (booChar && booMayus && booMinus) {
        clave = true;
    }
    return true;
}


//validacion de la fecha




//Valida que ingrese en el campo nombre : 2 nombres
function validarNombres() {
    var  name = false;
     var elemento = document.getElementById("nombres");
     var nombres= elemento.value.split(' ');
     if (nombres.length == 2) {
        document.getElementById("mensajeNombre").innerHTML =
        " ";
    }  else {
        document.getElementById("mensajeNombre").innerHTML =
            "<br>invalido debe ingresar dos nombres";
        
        return false;
    } 
    
    name = true;
 }

 validarapellidos
 function validarapellidos() {
    var  name = false;
     var elemento = document.getElementById("apellidos");
     var nombres= elemento.value.split(' ');
     if (nombres.length == 2) {
        document.getElementById("mensajeApellido").innerHTML =
        " ";
    }  else {
        document.getElementById("mensajeApellido").innerHTML =
            "<br>invalido debe ingresar dos apellidos";
        
        return false;
    } 
    
    name = true;
 }



 function validarNombresp() {
    var  name = false;
     var elemento = document.getElementById("nombres");
     var nombres= elemento.value.split(' ');
     if (nombres.length == 1) {
        document.getElementById("mensajeNombre").innerHTML =
        "es obligatorio ingresar dos nombres";
    } else if (nombres.length == 2) {
        document.getElementById("mensajeNombre").innerHTML =
        " ";
    }else if (nombres.length == 3) {
        document.getElementById("mensajeNombre").innerHTML =
        "<br>invalido debe ingresar dos nombres";
    }
    
     else {
        document.getElementById("mensajeNombre").innerHTML =
            "<br>invalido debe ingresar dos nombres";
        
        return false;
    } 
    
    name = true;
 }


 function dosPalabras(string) {
    var out = '';
    var array = string.split(' ');
    if (array.length == 1){
        out += array[0];
    } else {
        out += array[0] + ' ' + array[1];
    }
    
    return out;
}
 



function validarFechar(fecha) {
    var array =fecha.value.split('/');
    var fecha = new Date(+array[2], array[1]-1, array[0]);
    console.log(fecha)
    if (array.length == 3 && fecha 
        && +array[0] == fecha.getDate() 
        && array[1]-1 == fecha.getMonth() 
        && array[2] == fecha.getFullYear()) {
   
    console.log('hola')
    document.getElementById("mensajeFecha").innerHTML = " ";
    
        }
        else {
           
            document.getElementById("mensajeFecha").innerHTML =
            "<br>Fecha mal ingresada, usar formato dd/mm/yyyy";
    
            return true;
        }
    
}




function validarcontrasena1(){
    var clave = false;
    var elemento = document.getElementById("contrasena1");
    if (elemento.value.length >= 8) {
        document.getElementById("mensajePassword").innerHTML = "";
        var booChar = false;
        var booMayus = false;
        var booMinus = false;
        for (var i = 0; i < elemento.value.length; i++) {
            var codigo = elemento.value.charCodeAt(i);
            //codigo= _ @ $
            if ((codigo == 95 || codigo == 64 || codigo == 36) && !booChar)
            {
                booChar = true;
            }
            else if (codigo > 64 && codigo < 91 && !booMayus)
            {
                booMayus = true;
            }
            else if (codigo > 96 && codigo < 123 && !booMinus) 
            {
                booMinus = true;
            }
        }
        if (!booChar)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar un caracter especial  #$@ " ;
        if (!booMayus)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar una Mayuscula";
        if (!booMinus)
            document.getElementById("mensajePassword").innerHTML =
                "<br>agregar una minuscula";
    } else {
        document.getElementById("mensajePassword").innerHTML =
            "<br>Contraseña debe tener minimo 8 caracteres";
        return false;
    }
    if (booChar && booMayus && booMinus) {
        clave = true;
    }
    return true;
}



function validarcontrasena2(){
    var clave = false;
    var elemento = document.getElementById("contrasena2");
    if (elemento.value.length >= 8) {
        document.getElementById("mensajePassword2").innerHTML = "";
        var booChar = false;
        var booMayus = false;
        var booMinus = false;
        for (var i = 0; i < elemento.value.length; i++) {
            var codigo = elemento.value.charCodeAt(i);
            //codigo= _ @ $
            if ((codigo == 95 || codigo == 64 || codigo == 36) && !booChar)
            {
                booChar = true;
            }
            else if (codigo > 64 && codigo < 91 && !booMayus)
            {
                booMayus = true;
            }
            else if (codigo > 96 && codigo < 123 && !booMinus) 
            {
                booMinus = true;
            }
        }
        if (!booChar)
            document.getElementById("mensajePassword2").innerHTML =
                "<br>agregar un caracter especial  #$@ " ;
        if (!booMayus)
            document.getElementById("mensajePassword2").innerHTML =
                "<br>agregar una Mayuscula";
        if (!booMinus)
            document.getElementById("mensajePassword2").innerHTML =
                "<br>agregar una minuscula";
    } else {
        document.getElementById("mensajePassword2").innerHTML =
            "<br>Contraseña debe tener minimo 8 caracteres";
        return false;
    }
    if (booChar && booMayus && booMinus) {
        clave = true;
    }
    return true;
}