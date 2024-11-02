<?php

function conectar()
{
    $dsn = "institucion";  
    $user = "root";
    $pass = "";

    // Conectar usando ODBC
    $conn = odbc_connect($dsn, $user, $pass);

    if (!$conn) {
        die("Connection to DB via ODBC failed: " . odbc_errormsg());
    }

    return $conn;
}
?>
