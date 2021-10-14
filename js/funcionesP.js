function mostrarp() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        document.getElementById("selSeleccion").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","php/categorias.php",true);
    xmlhttp.send();
}

