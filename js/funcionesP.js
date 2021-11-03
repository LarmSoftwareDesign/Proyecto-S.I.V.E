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

//? filtro catagorias
function mostrarpC1(categorias) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        document.getElementById("txtSeleccion").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","php/MostrarProductos.php?categorias="+categorias,true);
    xmlhttp.send();   
}

// ! filtro Condicion
function mostrarpC2(condicion) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("txtSeleccion").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","php/MostrarProductos.php?condicion="+condicion,true);
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



//* funciones para comprar y encargar productos

function cargarCE(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("CE").innerHTML = this.responseText;
    }
  };
  
  xmlhttp.open("GET","php/cargar C&E.php",true);
  xmlhttp.send();
  
}

function carrito() {
  let idp =document.querySelector("#IDP").value;
  let cantidad =document.querySelector("#Cantidad").value;
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("t").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","php/registrerC.php?id="+idp+"&cantidad="+cantidad,true);
  xmlhttp.send();   

  
  
}


// funciones para la pagina carrito

function cargarEn(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("CED").innerHTML = this.responseText;
    }
  };
  
  xmlhttp.open("GET","php/Encargos.php",true);
  xmlhttp.send();
  
}

//* funcion para encontrar las 


function cargarProductosE() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("productosCreados").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","php/MostrarProductosEmpresa.php",true);
  xmlhttp.send();
}

// funciones de comprar

function CargarCompras(){
  cargarRegistro();
  cargarTotal();
}


function cargarRegistro(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("RegistraC").innerHTML = this.responseText;
    }
  };
  
  xmlhttp.open("GET","php/compra.php",true);
  xmlhttp.send();
  
}
function cargarTotal(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("Compra").innerHTML = this.responseText;
    }
  };
  
  xmlhttp.open("GET","php/mostrarCompra.php",true);
  xmlhttp.send();
  
}

function CargarComprasFiniquitadas(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      document.getElementById("compras").innerHTML = this.responseText;
    }
  };
  
  xmlhttp.open("GET","php/Mostrarcompras.php",true);
  xmlhttp.send();
  
}