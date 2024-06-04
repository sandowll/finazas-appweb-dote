<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO CAJA MONETARIA VIRTUAL DOTE</title>
    <link rel="icon" type="image/png" href="./imagenes/logo/logo.svg" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('./imagenes/fondo/Fondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; height: 100vh; display: flex; align-items: center; justify-content: center;">
      <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">DOTE CAJA MONETARIA</h1>
                        <img src="./imagenes/logo/logo.svg" alt="LikeFans" class="img-fluid mb-3" width="200">
                        <p class="card-text">"Guarda tu dinero de manera segura y accesible para cumplir tus metas: pagar deudas, comprar una moto, tener un fondo para emergencias, ayudar a tus padres o costear los estudios de tus hijos. Nuestra caja monetaria virtual te brinda la tranquilidad de ahorrar para lo que más necesites o desees."</p>
                        <div class="row">
                            <div class="col">
                                <a class="nav-link" onclick="document.getElementById('modal-wrapper').style.display='block'">
                                    <button class="btn btn-warning btn-block" style="background-color: #f3df00; color: black; border-color: black;">INGRESAR</button>
                                </a>
                            </div>
                            <div class="col">
                                <a class="nav-link" onclick="document.getElementById('modal2-wrapper').style.display='block'">
                                    <button class="btn btn-warning btn-block" style="background-color: #f3df00; color: black; border-color: black;">REGISTRARSE</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Importar archivos de modales -->
    <?php include 'modal/login.php'; ?>
    <?php include 'modal/registro.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
