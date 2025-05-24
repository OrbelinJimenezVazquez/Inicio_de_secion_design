<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decodificar los datos JSON recibidos
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si los datos se decodificaron correctamente
    if ($data !== null) {
        // Incluir el archivo de conexión a la base de datos
        require 'conexion.php';

        // Obtener los valores del nuevo artículo
        $nombre = $data['nombre'];
        $imagen = $data['imagen'];
        $empresa = $data['empresa'];
        $fechaCompra = $data['fechaCompra'];
        $noSeguimiento = $data['noSeguimiento'];
        $precio = $data['precio'];
        $estado = $data['estado']; // Agregado para incluir el estado

        // Preparar la consulta SQL para insertar el nuevo artículo en la tabla de compras
        $sql = "INSERT INTO compras (nombre, imagen, empresa, diaCompra, noSeguimiento, precio, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Preparar la sentencia
        $stmt = mysqli_prepare($conexion, $sql);
        
        // Verificar si la preparación de la sentencia fue exitosa
        if ($stmt) {
            // Asignar los valores a los parámetros de la sentencia
            mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $imagen, $empresa, $fechaCompra, $noSeguimiento, $precio, $estado);
            
            // Ejecutar la sentencia
            if (mysqli_stmt_execute($stmt)) {
                // Si la ejecución fue exitosa, devolver una respuesta de éxito al cliente
                http_response_code(201); // Código de respuesta "Created"
                echo json_encode(array("message" => "La compra fue agregada correctamente."));
            } else {
                // Si la ejecución falló, devolver un mensaje de error al cliente
                http_response_code(500); // Código de respuesta "Internal Server Error"
                echo json_encode(array("message" => "No se pudo agregar la compra. Error en la ejecución de la consulta: " . mysqli_error($conexion)));
            }

            // Cerrar la sentencia
            mysqli_stmt_close($stmt);
        } else {
            // Si la preparación de la sentencia falló, devolver un mensaje de error al cliente
            http_response_code(500); // Código de respuesta "Internal Server Error"
            echo json_encode(array("message" => "No se pudo agregar la compra. Error en la preparación de la consulta."));
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        // Si los datos JSON no pudieron ser decodificados, devolver un mensaje de error al cliente
        http_response_code(400); // Código de respuesta "Bad Request"
        echo json_encode(array("message" => "No se recibieron datos válidos."));
    }
} else {
    // Si no se recibió una solicitud POST, devolver un mensaje de error al cliente
    http_response_code(405); // Código de respuesta "Method Not Allowed"
    echo json_encode(array("message" => "Solo se permiten solicitudes POST."));
}
?>
