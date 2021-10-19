function mostrarp(seleccion) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        document.getElementById("txtSeleccion").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","php/MostrarProductos.php?seleccion="+seleccion,true);
    xmlhttp.send();
}

function cargarCategorias() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("selSeleccion").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","php/categorias.php",true);
  xmlhttp.send();
}