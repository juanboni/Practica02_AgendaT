
function buscarPorCorreo
(){
    var correo = document.getElementById("correo").value;
    if (correo == "") {
        document.getElementById("informacionco").innerHTML = "";   
    }else{
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("informacionco").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controladores/buscarc.php?correo="+correo,true);
        xmlhttp.send();
    }
    return false;
}