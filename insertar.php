<?php
include("connex.php");
$conn = conectar();

// Obtener datos del formulario y sanitizarlos
$nombre = htmlspecialchars(trim($_POST['nombre']));
$apellidos = htmlspecialchars(trim($_POST['apellidos']));
$edad = (int) $_POST['edad']; // Asegúrate de que sea un número
$domicilio = htmlspecialchars(trim($_POST['domicilio']));
$telefono = htmlspecialchars(trim($_POST['telefono']));
$email = htmlspecialchars(trim($_POST['correo'])); // Corrige el nombre del campo

// Consulta SQL para insertar datos
$sql = "INSERT INTO alumnos (Nombre, Apellidos, Edad, Domicilio, Telefono, Correo_Electronico) 
        VALUES ('$nombre', '$apellidos', $edad, '$domicilio', '$telefono', '$email')";

$rs = odbc_exec($conn, $sql);

if ($rs) {
    header("Location: index.php"); // Redirigir después de insertar
    exit(); // Asegúrate de que no se ejecute más código
} else {
    echo "Error en la consulta: " . odbc_errormsg($conn);
}

// Cerrar la conexión
odbc_close($conn);
?>


