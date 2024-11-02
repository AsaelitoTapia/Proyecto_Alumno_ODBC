<?php

include("connex.php");
$conn = conectar();

$alumno_id = $_GET['id'];  // Obtenemos el ID del alumno a eliminar

// Consulta para eliminar el registro del alumno
$sql = "DELETE FROM alumnos WHERE Alumno_ID='$alumno_id'";
$rs = odbc_exec($conn, $sql);

if (!$rs) {
    // Si la consulta falla, mostramos un mensaje de error
    echo "Error al eliminar el registro: " . odbc_errormsg($conn);
} else {
    // Si la eliminación fue exitosa, redirigimos al index.php
    Header("Location: index.php");
}

odbc_close($conn);
?>
