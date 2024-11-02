<?php
include("connex.php");
$conn = conectar();

$id = $_GET['id'];  // Obtenemos el Alumno_ID desde la URL

// Verificamos si se envía el formulario para realizar la actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['telefono'];
    $email = $_POST['correo_electronico'];

    // Consulta de actualización
    $sql = "UPDATE alumnos SET Nombre='$nombre', Apellidos='$apellidos', Edad='$edad', Domicilio='$domicilio', Telefono='$telefono', Correo_Electronico='$email' WHERE Alumno_ID='$id'";
    $rs = odbc_exec($conn, $sql);

    if ($rs) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . odbc_errormsg($conn);
    }
    odbc_close($conn);
}

// Obtenemos los datos actuales del alumno para mostrarlos en el formulario
$sql = "SELECT * FROM alumnos WHERE Alumno_ID='$id'";
$rs = odbc_exec($conn, $sql);

if (odbc_fetch_row($rs)) {
    $nombre = utf8_encode(odbc_result($rs, "Nombre"));
    $apellidos = utf8_encode(odbc_result($rs, "Apellidos"));
    $edad = odbc_result($rs, "Edad");
    $domicilio = utf8_encode(odbc_result($rs, "Domicilio"));
    $telefono = utf8_encode(odbc_result($rs, "Telefono"));
    $email = utf8_encode(odbc_result($rs, "Correo_Electronico"));
} else {
    echo "No se encontró el alumno.";
    odbc_close($conn);
    exit;
}
?>

<?php include("formulario_alumno.php"); ?>
