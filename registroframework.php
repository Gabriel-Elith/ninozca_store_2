<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ninozca Store | Crear Cuenta</title>

<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS personalizado -->
  <link rel="stylesheet" href="estilos.css">  
  
  </head>
<body>

  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <!-- CORRECCIÓN 1: Se enlaza el formulario con el procesador mediante POST -->
    <form class="row g-3" action="procesar_registro.php" method="POST" style="max-width: 800px; width: 100%;">

      <div class="col-12 text-center">
        <h1>Ninozca Store</h1>
        <p>Crear una cuenta</p>
      </div>

  <div class="col-12">
    <a href="index.php" class="btn-volver-tienda">
        <i class="bi bi-arrow-left"></i> Volver a la tienda
    </a>
  </div>

      <!-- CORRECCIÓN 2: Se agregó el atributo 'name' idéntico a las columnas de tu base de datos -->
      <div class="col-md-6">
        <label for="inputNombres" class="form-label">Nombres</label>
        <input type="text" class="form-control" id="inputNombres" name="nombre" required />
      </div>

      <div class="col-md-6">
        <label for="inputApellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="inputApellidos" name="apellidos" required />
      </div>

      <div class="col-md-6">
        <label for="inputCC" class="form-label">Número de cédula</label>
        <input type="text" class="form-control" id="inputCC" name="identificacion" required />
      </div>

      <div class="col-md-6">
        <label for="inputDirrecion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="inputDirrecion" name="direccion" required />
      </div>

      <div class="col-md-6">
        <label for="inputCiudad" class="form-label">Ciudad</label>
        <input type="text" class="form-control" id="inputCiudad" name="ciudad" required />
      </div>

      <div class="col-md-6">
        <label for="inputCorreo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="inputCorreo" name="correo" required />
      </div>

      <div class="col-md-6">
        <label for="inputUsuario" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="inputUsuario" name="usuario_reg" required />
      </div>

      <div class="mb-3">
        <label for="Inputcontraseña" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="Inputcontraseña" name="password_reg" required />
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary w-100">Registrarme</button>
      </div>
    </form>
  </div>

    <script
      src="https://jsdelivr.net"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWjLh+8pM6v3f6R+2Lq4L8M"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
