<?php
//Se utila require para llamar al archivo que contiene la conexion a la base de datos
require 'conexion.php';

//Validamos que el formulario y el boton de login han sido presionados
if(isset($_POST['registro'])){

    //Obtener los valores enviados al formulario
    $usuario = $_POST['nombre_user'];
    $pass = $_POST['pass_user'];
    $correo = $_POST['correo_user'];

    //Ejecutamos la consulta a la base de datos utilizando la funcion mysqli_query
    $sql = "INSERT INTO usuarios (nombre_user, pass_user, correo_user) VALUES ('$usuario', '$pass', '$correo')" ;
    $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            //Inicio de seccion exitoso
            echo "Se ingresaron los datos de manera correcta!!";
            header("Location: ../login.html");
            exit;
        } else{
            //Credenciales invalidad
            echo "No se puedo registrar los datos" . "<br>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
}
?>