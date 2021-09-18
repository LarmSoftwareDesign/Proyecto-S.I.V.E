// ! funcion de mostrar contraseña
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function myFunction1() {
    var x = document.getElementById("myInput1");
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

  }
  
  
}


