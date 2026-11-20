<!doctype html>
<html lang="es">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ninozca Store</title>

<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS personalizado -->
    <link rel="stylesheet" href="estilos.css"> 

  </head>

  <body>
    <!-- CORRECCIÓN 1: Se agrega action y method -->

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
      <form class="formulario-login" action="procesar_login.php" method="POST">
    
      <a href="index.php" class="btn-volver-tienda">
        <i class="bi bi-arrow-left"></i> Volver a la tienda
      </a>

      <div class="col-12 text-center">
        <h1>Ninozca Store</h1>
        <p>Ingresa a tu cuenta</p>
      </div>

      <div class="mb-3">
        <label for="IngresoUsuario" class="form-label">
          Nombre de usuario
        </label>
        <!-- CORRECCIÓN 2: Se añade name="usuario_login" para PHP -->
        <input
          type="text"
          class="form-control"
          id="IngresoUsuario"
          name="usuario_login"
          required
        />
        <div id="emailHelp" class="form-text">
          Nunca compartiremos tus datos con nadie más.
        </div>
      </div>

      <div class="mb-3">
        <label for="ContraseñaUsuario" class="form-label">Contraseña</label>
        <!-- CORRECCIÓN 3: Se añade name="password_login" para PHP -->
        <input 
          type="password" 
          class="form-control" 
          id="ContraseñaUsuario" 
          name="password_login"
          required
        />
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="recordarDatos" />
        <label class="form-check-label" for="recordarDatos">Recordar datos de usuario</label>
      </div>
      
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWjLh+8pM6v3f6R+2Lq4L8M"
      crossorigin="anonymous"
    ></script>
  </body>
</html>