<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Alumno</title>
    <link href="styles.css" rel="stylesheet"> <!-- Estilos generales -->
    <link href="formulario.css" rel="stylesheet"> <!-- Estilos específicos del formulario -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center display-6 font-weight-bold title-border animated-title">Actualización De Información</h2>

        <form method="POST" class="border p-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $apellidos; ?>" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" id="edad" name="edad" class="form-control" value="<?php echo $edad; ?>" required>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" value="<?php echo $domicilio; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono; ?>" required>
            </div>

            <div class="mb-3">
                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" value="<?php echo $email; ?>" required>
            </div>

            <button type="submit" class="btn btn-dark btn-block font-weight-bold w-100">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
