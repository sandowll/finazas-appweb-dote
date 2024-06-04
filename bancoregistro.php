<?php
// Obtener datos del formulario
$user = $_POST['realname'];
$mail = $_POST['nick'];
$pass = $_POST['pass'];
$rpass = $_POST['rpass'];
$tdocumento = $_POST['tdocumento'];
$documento = $_POST['documento'];

// Incluir la conexión a la base de datos
require("bancoconexion.php");

// Verificar si el correo ya está registrado
$checkemail = mysqli_query($mysqli, "SELECT * FROM cuentas WHERE email='$mail'");
$check_mail = mysqli_num_rows($checkemail);

if ($pass == $rpass) {
    if ($check_mail > 0) {
        echo '<script language="javascript">alert("Atención, ya existe el correo designado para un usuario, verifique sus datos");</script>';
        echo "<script>location.href='index.php'</script>";
    } else {
        // Convertir $documento a entero
        $documento_int = intval($documento);
        
        // Ejecutar la consulta de inserción
        mysqli_query($mysqli, "INSERT INTO cuentas (user, password, email, tdocumento, documento, pasadmin, rol) VALUES ('$user', '$pass', '$mail', '$tdocumento', '$documento_int', '', '2')");
        
        echo '<script language="javascript">alert("Usuario registrado con éxito");</script>';
        echo "<script>location.href='index.php'</script>";
    }
} else {
    echo 'Las contraseñas no coinciden';
}
?>
