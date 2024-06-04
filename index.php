<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-capsulam</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 400px;
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
                            <h1 style="font-size:x-large; color:black; ">D-capsulam</h1>
                            <p class="mt-3 text-left"><img src="./imagenes/logo/logo.svg" width="200" class="img-fluid float-left" alt="LikeFans"> <h5 style="color:black; ">
                                Generamos un impacto positivo en la sociedad, transformando la vida de las personas que hacen parte de los diferentes programas y esquemas que apoyamos en nuestra organización.</h5></p>
                            <div class="row">
                                <div class="col">
                                    <a class="nav-link" onclick="document.getElementById('modal-wrapper').style.display='block'"><button class="btn btn-warning" style="background-color: #f3df00; color: black; border-color: black; width: 100%;">INGRESAR </button></a>
                                </div>
                                <div class="col">
                                    <a class="nav-link" onclick="document.getElementById('modal2-wrapper').style.display='block'"><button class="btn btn-warning" style="background-color: #f3df00; color: black; border-color: black; width: 100%;">REGISTRARSE </button></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Importar archivos de modales -->
    <?php include 'modal/login.php'; ?>
    <?php include 'modal/registro.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
