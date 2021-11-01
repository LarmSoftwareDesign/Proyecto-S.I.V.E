// ! funcion de mostrar contraseña
function myFunction() {
    var x = document.getElementById("validationCustom06");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

 // ! funcion de mostrar verificar contraseña
  function myFunction1() {
    var x = document.getElementById("validationCustom07");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
   // ! funcion de mostrar verificar contraseña
  function myFunction2() {
    var x = document.getElementById("floatingPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

// ? funcion de galeria

function cambio( num ) {
 
  let x = document.getElementById("F");
  let y= document.getElementById("G"+num);
  let ruta=y.src; 
  switch (num) {
    case 1:
      x.src=ruta;
      break;
    
    case 2:
      x.src=ruta;
      break;
    case 3:
      x.src=ruta;
      break;
    case 4:
      x.src=ruta;
      break;
    case 5:
      x.src=ruta;
      break;

  }
  
  
}
