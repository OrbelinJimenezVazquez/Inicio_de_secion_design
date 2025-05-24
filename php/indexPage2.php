<?php
// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Consulta SQL para seleccionar todos los registros de la tabla de compras
$sql = "SELECT * FROM compras";
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Inicializar un array para almacenar los datos de las compras
    $compras = [];
    $totalComprasAnio = 0;
    $totalComprasMes = 0;

    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Formatear la fecha de compra
        $fechaCompra = date('d/m/Y', strtotime($fila['diaCompra']));

        // Agregar los datos formateados al array
        $fila['diaCompra'] = $fechaCompra;
        $compras[] = $fila;

        // Sumar el precio de cada compra al total por año y por mes
        $totalComprasAnio += $fila['precio'];
        
        // Convertir la fecha de compra a un objeto DateTime
$fechaCompraObj = DateTime::createFromFormat('d/m/Y', $fila['diaCompra']);

// Verificar si la conversión fue exitosa
if ($fechaCompraObj !== false) {
    // Obtener el año y el mes de la fecha de compra
    $anioCompra = $fechaCompraObj->format('Y');
    $mesCompra = $fechaCompraObj->format('m');
    
    // Obtener el año y el mes actual
    $anioActual = date('Y');
    $mesActual = date('m');
    
    // Si la compra es del año y mes actual, sumar su precio al total del mes
    if ($anioCompra == $anioActual && $mesCompra == $mesActual) {
        $totalComprasMes += $fila['precio'];
    }
} else {
}

        
        // Obtener el año y el mes actual
        $anioActual = date('Y');
        $mesActual = date('m');
        
        // Si la compra es del año y mes actual, sumar su precio al total del mes
        if ($anioCompra == $anioActual && $mesCompra == $mesActual) {
            $totalComprasMes += $fila['precio'];
        }
        
        echo '<script>';
        echo 'console.log("Datos de compras:", ' . json_encode($compras) . ');';
        echo '</script>';
    }
} else {
    // Manejar el caso en que la consulta no sea exitosa
    $error = mysqli_error($conexion);
    echo "Error en la consulta: $error";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
