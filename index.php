<?php
// Iniciamos el sistema de sesiones en esta página
session_start();

// Si el usuario inició sesión, guardamos su nombre; si no, lo dejamos como 'Invitado'
$nombre_usuario_actual = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
?>
<!doctype html>
<html lang="es">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ninozca Store | Tienda en línea</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Iconos -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="tienda.css" />
  </head>

  <body>
    <!-- Barra superior -->

    <div class="top-bar">

      <span><i class="bi bi-truck"></i> Envíos a todo el país</span>
      <span>Compras seguras y confiables</span>
      <span><i class="bi bi-person-circle"></i> Hola, <?php echo $nombre_usuario_actual; ?></span>

    </div>

    <!-- Encabezado -->
    <header class="main-header">
      <div class="logo">
        <i class="bi bi-bag-heart-fill"></i>
        <h1>Ninozca<br />Store</h1>
      </div>

      <div class="search-box">
        <input type="text" placeholder="Buscar productos..." />
        <button><i class="bi bi-search"></i></button>
      </div>

      <div class="header-actions">
        <a href="ver_carrito.php"><i class="bi bi-cart3"></i> Carrito</a>

        <?php if ($nombre_usuario_actual === 'Invitado'): ?>
         <!-- Si no ha entrado, ve estas opciones -->
        <a href="loginframework.php"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
        <a href="registroframework.php"><i class="bi bi-person-plus-fill"></i> Crear cuenta</a>
       <?php else: ?>
        <!-- Si ya inició sesión, ve esta opción -->
        <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
        <?php endif; ?>
      </div>


    </header>

    <!-- Menú de navegación -->
    <nav class="navigation">
      <a href="#" class="active"><i class="bi bi-house-fill"></i> Inicio</a>
      <a href="#categorias"><i class="bi bi-grid"></i> Categorías</a>
      <a href="#"><i class="bi bi-bag"></i> Mis compras</a>
      <a href="#"><i class="bi bi-envelope"></i> Contacto</a>
      <a href="tutorial.php"><i class="bi bi-book"></i> Tutorial</a>
    </nav>

    <main class="container-fluid px-4">
      <!-- Contenido principal -->
      <section class="store-layout">
        <!-- Categorías -->
        <aside class="categories" id="categorias">
          <h3><i class="bi bi-grid-fill"></i> Categorías</h3>

          <a href="#"
            ><i class="bi bi-tag"></i> Ropa <i class="bi bi-chevron-right"></i
          ></a>
          <a href="#"
            ><i class="bi bi-handbag"></i> Accesorios
            <i class="bi bi-chevron-right"></i
          ></a>
          <a href="#"
            ><i class="bi bi-house"></i> Hogar
            <i class="bi bi-chevron-right"></i
          ></a>
          <a href="#"
            ><i class="bi bi-flower1"></i> Belleza
            <i class="bi bi-chevron-right"></i
          ></a>
          <a href="#"
            ><i class="bi bi-headphones"></i> Tecnología
            <i class="bi bi-chevron-right"></i
          ></a>
          <a href="#"
            ><i class="bi bi-three-dots"></i> Otros
            <i class="bi bi-chevron-right"></i
          ></a>
        </aside>

        <!-- Banner principal -->
        <section class="banner">
          <!-- Aquí puedes agregar tu imagen promocional -->
          <div class="banner-content">
            <h2>Bienvenido a<br /><span>Ninozca Store</span></h2>
            <p>Moda, estilo y mucho más en un solo lugar.</p>
            <a href="#productos" class="btn-store"
              >Comprar ahora <i class="bi bi-arrow-right"></i
            ></a>
          </div>

          <div class="banner-image">
            <!-- Agregar imagen -->
          </div>
        </section>
      </section>

      <!-- Productos destacados -->
<div class="row g-3">
  <?php
  // Incluimos la conexión al principio si no lo has hecho
  include 'conexion.php';

  // Consultamos los productos de la base de datos sistema_ventas_ninozca
  $sql_consulta = "SELECT * FROM productos";
  $resultado_productos = mysqli_query($conexion, $sql_consulta);

  // Si hay productos guardados, los recorremos con un bucle while
  if (mysqli_num_rows($resultado_productos) > 0) {
      while ($prod = mysqli_fetch_assoc($resultado_productos)) {
          ?>
          <!-- Esta tarjeta se repetirá automáticamente por cada producto en la BD -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="product-card">
              <div class="product-image">
                <span class="product-label">Disponible</span>
                <!-- Aquí irá tu lógica de imágenes más adelante -->
              </div>
                <div class="product-info">
                    <h5><?php echo $prod['descripcion']; ?></h5>
                    <p class="talla text-muted">Talla: <?php echo $prod['talla']; ?></p>
                    <p class="price">$<?php echo number_format($prod['precio'], 0, ',', '.'); ?></p>
                    
                    <!-- VALIDACIÓN DE BOTÓN SEGÚN EL ROL -->
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <!-- Si es administrador, le da opción de ir a gestionar -->
                        <a href="admin_productos.php" class="btn btn-warning w-100 btn-sm mt-2">
                            <i class="bi bi-gear"></i> Gestionar (Admin)
                        </a>
                    <?php else: ?>
                        <!-- Si es cliente o invitado, ve el formulario normal del carrito -->
                        <form action="agregar_carrito.php" method="POST">
                          <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">
                          <input type="hidden" name="cantidad" value="1">
                          <button type="submit" class="btn-product">
                            <i class="bi bi-cart3"></i> Agregar al carrito
                          </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
          </div>
          <?php
      }
  } else {
      echo "<p class='text-center w-100'>No hay productos disponibles en este momento.</p>";
  }
  ?>
</div>

    <!-- Pie de página -->
    <footer class="footer">
      <div class="footer-logo">
        <i class="bi bi-bag-heart-fill"></i>
        <h3>Ninozca Store</h3>
      </div>

      <div class="footer-links">
        <a href="#">Términos y condiciones</a>
        <a href="#">Política de privacidad</a>
        <a href="#">Ayuda</a>
      </div>

      <div class="social-links">
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-whatsapp"></i></a>
      </div>
    </footer>
  </body>
</html>
