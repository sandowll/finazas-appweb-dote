<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (@!$_SESSION['user']) {
  header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
  header("Location:index2.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bancolombia</title>
    <link rel="icon" type="image/png" href="imagenes/bancolombia.png" />
    <link href="static/css/style.css" rel="stylesheet">
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #home-box {
            display: block;
            
            color:black;
            -webkit-border-top-left-radius: 3px;
            -webkit-border-top-right-radius: 3px;
            -moz-border-radius-topleft: 3px;
            -moz-border-radius-topright: 3px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        #home-box .content {
            padding: 25px 30px;
            line-height: 22px;
        }

        #home-box .content h1 {
            font-size: 26px;
            font-weight: normal;
            line-height: 32px;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-light">
    <main role="main" class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-3 p-3 bg-white rounded box-shadow box-style">
                    <div id="home-box">
                        <div class="content">
                            <center>
                                <?php
                                extract($_GET);
                                require("bancoconexion.php");

                                $sql="SELECT * FROM cuentas WHERE id=$id";
                                $ressql=mysqli_query($mysqli,$sql);
                                while ($row=mysqli_fetch_row ($ressql)){
                                    $id=$row[0];
                                    $user=$row[1];
                                    $pass=$row[2];
                                    $email=$row[3];
                                    $tdocumento=$row[4];
                                    $documento=$row[5];
                                    $pasadmin=$row[6];
                                }
                                ?>
                                <form action="ejecutacuenta.php" method="post">
                                    Id<br><input type="text" class="form-control" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
                                    Usuario<br> <input type="text" class="form-control" name="user" value="<?php echo $user?>"><br>
                                    Contraseña usuario<br> <input type="text"class="form-control"  name="pass" value="<?php echo $pass?>"><br>
                                    Correo<br> <input type="text" class="form-control" name="email" value="<?php echo $email?>"><br>
                                    tdocumento<br> <input type="text" class="form-control" name="tdocumento" value="<?php echo $tdocumento?>"><br>
                                    documento<br> <input type="text" class="form-control" name="documento" value="<?php echo $documento?>"><br>
                                    Contraseña admin<br> <input type="text"class="form-control"  name="pasadmin" value="<?php echo $pasadmin?>"><br>
                                    <br>
                                    <input type="submit" value="Modificar" class="btn btn-warning">
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
