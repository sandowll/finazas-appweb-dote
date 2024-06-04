<?php


extract($_POST);
	require("bancoconexion.php");
	$sentencia="update dinero set dinero='$dinero' where id='$id'";
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo '<script>alert("ERROR EN PROCESAMIENTO DE LA TRASFERENCIA ")</script> ';
		echo "<script>location.href='midinero.php'</script>";
	}else {
		echo '<script>alert("TRASFERENCIA REALIZADA")</script> ';
		
		echo "<script>location.href='midinero.php'</script>";

		
	}
?>