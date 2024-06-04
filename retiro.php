<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:index.php");
    exit();
} elseif ($_SESSION['rol'] == 1) {
    header("Location:admin.php");
    exit();
}

require("./conexion");

$id = $_GET['id'] ?? null;
$dinero = 0;

$sql = "SELECT * FROM dinero WHERE id='$id'";
$ressql = mysqli_query($mysqli, $sql);
if ($row = mysqli_fetch_row($ressql)) {
    $id = $row[0];
    $dinero = $row[1];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTE CAJA MONETARIA</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .box-style {
            max-width: 600px;
            margin: auto;
        }
        #home-box {
           
            color: black;
            border-radius: 3px;
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
            margin: 0 0 5px 0;
        }
    </style>
    <script>
        function calcularRestante() {
            var n1 = parseFloat(document.MyForm.numero1.value);
            var n2 = parseFloat(document.MyForm.numero2.value);
            document.MyForm.dinero.value = n1 - n2;
        }
    </script>
</head>

<body class="bg-light">
    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-3 p-3 bg-white rounded box-shadow box-style">
                    <div id="home-box">
                        <div class="content">
                            <h1>Retiro de Dinero</h1>
                            <form name="MyForm" action="ejecutaactualizar1.php" method="post">
                                <div class="form-group">
                                    <label for="id" class="text-dark">Su ID es:</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="numero1" class="text-dark">Su dinero actual es:</label>
                                    <input type="number" class="form-control" name="numero1" value="<?php echo $dinero; ?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="numero2" class="text-dark">Cantidad de dinero que desea retirar:</label>
                                    <input type="number" class="form-control" name="numero2">
                                </div>
                                <div class="form-group">
                                    <label for="dinero" class="text-dark">El dinero que le quedaría en la cuenta sería:</label>
                                    <input type="number" class="form-control" name="dinero" readonly="readonly">
                                </div>
                                <button type="button" class="btn my-3"style="background-color: #f3df00; color: black; border-color: black; width: 100%;" onclick="calcularRestante()">Visualizar</button>
                                <button type="submit" class="btn "style="background-color: #f3df00; color: black; border-color: black; width: 100%;" onclick="calcularRestante()">Retirar Dinero</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>






