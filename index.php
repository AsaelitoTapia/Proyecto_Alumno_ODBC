<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> PROYECTO: REGISTRO DE ALUMNOS CON PHP Y ODBC</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <!-- Aplicación de la clase de animación personalizada -->
        <h1 class="text-center display-4 font-weight-bold sub-title-border animated-title">REGISTRO DE ALUMNOS</h1>
    </div>
    
    <div class="container mt-5">
      <div class="row">
        <!-- Columna de la tabla -->
        <div class="col-xs-8">
          <table class="table table-hover table-striped align-middle text-center">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Domicilio</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Actualizar</th>
                <th>Borrar</th>
              </tr>
            </thead>
            <tbody>
            <?php
            include("connex.php");
            $conn = conectar();

            // Consulta de la tabla 'alumnos'
            $sql = "SELECT * FROM alumnos";
            $rs = odbc_exec($conn, $sql);

            while (odbc_fetch_row($rs)) {
              $alumno_id = odbc_result($rs, "Alumno_ID");
              $nombre = utf8_encode(odbc_result($rs, "Nombre"));
              $apellidos = utf8_encode(odbc_result($rs, "Apellidos"));
              $edad = odbc_result($rs, "Edad");
              $domicilio = utf8_encode(odbc_result($rs, "Domicilio"));
              $telefono = utf8_encode(odbc_result($rs, "Telefono"));
              $email = utf8_encode(odbc_result($rs, "Correo_Electronico"));

              echo "<tr>";
              echo "<td>$alumno_id</td>";
              echo "<td>$nombre</td>";
              echo "<td>$apellidos</td>";
              echo "<td>$edad</td>";
              echo "<td>$domicilio</td>";
              echo "<td>$telefono</td>";
              echo "<td>$email</td>";
              ?>
              <td><a href="actualizar.php?id=<?php echo $alumno_id; ?>" class="btn btn-dark btn-custom">Actualizar</a></td>
              <td><a href="delete.php?id=<?php echo $alumno_id; ?>" class="btn btn-dark btn-custom">Eliminar</a></td>
              <?php
              echo "</tr>";
            }
            odbc_close($conn);
            ?>
            </tbody>
          </table>
        </div>

        <!-- Columna del formulario -->
        <div class="col-xs-8">
          <div class="border p-4 bg-white rounded shadow">
            <h2 class="text-center display-6 font-weight-bold sub-title-border animated-title">Agregar Alumnos</h2>
            <form action="insertar.php" method="POST" class="mt-4">
              <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
              </div>

              <div class="form-group mb-3">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
              </div>

              <div class="form-group mb-3">
                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" class="form-control" placeholder="Edad" required>
              </div>

              <div class="form-group mb-3">
                <label for="domicilio">Domicilio</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" placeholder="Domicilio" required>
              </div>

              <div class="form-group mb-3">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
              </div>

              <div class="form-group mb-3">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo Electrónico" required>
              </div>

              <button type="submit" class="btn btn-dark btn-block font-weight-bold w-100">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
