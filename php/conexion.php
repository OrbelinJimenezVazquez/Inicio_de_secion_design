<?php
// Aquí definimos las credenciales de nuestra base de datos
$server = "localhost";
$user = "root";
$pass = ""; // Deja la contraseña vacía si no tiene una configurada
$bd = "test2";

// Creamos la conexión a la base de datos utilizando la siguiente función
$conexion = mysqli_connect($server, $user, $pass, $bd);

// Verificamos si la conexión es exitosa o no
if (!$conexion) {
    die("No hay conexión: " . mysqli_connect_error()); // Si la conexión es fallida, se muestra un mensaje de error y se termina la ejecución del programa
}
?>
