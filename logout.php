<?php
session_start();
session_destroy(); // Borra todas las variables de sesión del servidor
header("Location: index.php"); // Lo manda de regreso a la tienda como Invitado
exit();
?>