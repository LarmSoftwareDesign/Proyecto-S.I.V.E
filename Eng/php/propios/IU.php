<?php
include ("usuarios.php");

if (isset($_POST["ci"])){

            $usuario["email"] = $_POST["email"];
			$usuario["nombre"] = $_POST["nombre"];
			$usuario["apellido"] = $_POST["apellido"];

            //! pasar de string a int
			$usuario["ci"] = intval($_POST["ci"]);
			$usuario["fnac"] = $_POST["fnac"];
			$usuario["direccion"] = $_POST["direccion"];
			$usuario["contraseña"] = $_POST["contraseña"];
			$usuario["verificarC"] = $_POST["verificarC"];
            $usuario["es"] = 'Cliente';
        
            

            //! verificar contraseña
            if (strcmp ($usuario["contraseña"] , $usuario["verificarC"] ) == 0) {
                ingresarUsuario($conexion, $usuario);
                
            }
            

            
            
            
    ingresarUsuario($conexion, $usuario);
}
cerrarConexion($conexion);

?>