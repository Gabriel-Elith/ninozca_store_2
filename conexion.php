<?php

// Dirección donde funciona el servidor de XAMPP.
$servidor = '127.0.0.1';

// Usuario con el que se conectó MySQL Workbench.
$usuario = 'root';

// Contraseña de MySQL.
// Si Workbench se conectó sin solicitar contraseña, dejar vacía.
$contrasena = '';

// Base creada con el archivo base_datos.sql.
$base_datos = 'sistema_ventas_ninozca';

// Puerto de MySQL mostrado en XAMPP y en MySQL Workbench.
$puerto = 3307;

// Crear la conexión.
$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $contrasena,
    $base_datos,
    $puerto
);

// Comprobar si hubo un problema.
if (!$conexion) {
    die('No fue posible conectarse a la base de datos.');
}

// Configurar caracteres como tildes y la letra ñ.
mysqli_set_charset($conexion, 'utf8mb4');