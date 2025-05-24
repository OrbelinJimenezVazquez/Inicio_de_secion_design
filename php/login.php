<?php
//Se utiliza require para llamar al archivo que contiene la conexión a la base de datos
require 'conexion.php';

//Validamos que el formulario y el botón de inicio de sesión han sido presionados
if(isset($_POST['login'])){

    //Obtener los valores enviados al formulario
    $usuario = $_POST['nombre_user'];
    $pass = $_POST['pass_user'];

    //Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "SELECT * FROM usuarios WHERE nombre_user = '$usuario' and pass_user ='$pass'";
    $resultado = mysqli_query($conexion, $sql);
    $numero_registros = mysqli_num_rows($resultado);
        if($numero_registros != 0){
            //Inicio de sesión exitoso
            header("Location: indexPage.php");
        } else{
            //Credenciales inválidas
            echo "Credenciales inválidas. Por favor verifica tu nombre de usuario y/o contraseña."."<br>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
}
?>
