<?php


extract($_POST);
	require("bancoconexion.php");
	$sentencia="update cuentas set user='$user', password='$pass', email='$email', tdocumento='$tdocumento', documento='$documento', pasadmin='$pasadmin' where id='$id'";
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo '<script>alert("ERROR AL ACTUALIZADA LA CUENTA ")</script> ';
		echo "<script>location.href='midinero.php'</script>";
	}else {
		echo '<script>alert("CUENTA ACTUALIZADA")</script> ';
		
		echo "<script>location.href='midinero.php'</script>";

		
	}
?>

