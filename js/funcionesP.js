function mostrarpC(categorias) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        document.getElementById("txtSeleccion").innerHTML = this.responseText;
      }
    };
   
    
    xmlhttp.open("GET","php/MostrarProductos.php?categorias="+categorias,true);
    xmlhttp.send();
     
    
    

}



// function actualizarCarrito(IdProducto){
            
//   var cantidad = document.getElementById(IdProducto).value;

//   var ruta = "cantidad="+cantidad+"&Id="+IdProducto;
  
//   $.ajax({
//       url:'funciones/agregarCarrito.php',
//       type:'POST',
//       data:ruta,
//   })
//   .done(function(res){
//       $('#mensaje'+IdProducto).html(res);
//   })

// };


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