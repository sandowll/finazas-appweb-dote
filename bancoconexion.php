<?php
// Definir variables de conexión
$db_host = "bpusmtaxyfrsu7hfcngn-mysql.services.clever-cloud.com";
$db_name = "bpusmtaxyfrsu7hfcngn";  // Nombre específico de la base de datos
$db_user = "umywo8beeohby24n";
$db_password = "iQASFO0SdKfDuusREG4b";
$db_port = 3306;

// Crear conexión
$mysqli = new MySQLi($db_host, $db_user, $db_password, $db_name, $db_port);

// Verificar la conexión
if ($mysqli->connect_errno) {
    die("Fallo la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Si la conexión es exitosa, no mostrar ningún mensaje
?>
