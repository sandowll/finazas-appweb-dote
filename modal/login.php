<!-- Formulario de Login -->

<div id="modal-wrapper" class="modal" style="background-color: rgba(0, 0, 0, 0.5);">
    <form class="modal-content animate container d-flex justify-content-center align-items-center rounded" action="bancovalida.php" method="POST" style="max-width: 400px;">
        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp" style="font-size: 24px;">&times;</span>
            <hr style="border-top: 1px solid #ccc; width: 100%; margin-bottom: 20px;">
            <div class="text-center mb-4">
                <img src="./imagenes/logo/logo.svg" alt="Logo" class="img-fluid shadow-sm rounded-circle" style="width: 60px; height: 60px;">
            </div>
            <h1 class="card-title text-center mb-4 fw-bold text-uppercase lh-1" style="font-family: 'Montserrat', sans-serif; letter-spacing: 3px;">DOTE CAJA MONETARIA</h1>
            <div class="container">
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="text" name="mail" class="form-control" placeholder="Email" required="">
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="">
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" required=""> Acepto los términos y condiciones
                    </label>
                </div>
                <div class="col-sm-12 my-1">
                    <button type="submit" class="btn btn-success px-5" style="background-color: #f3df00; color: black; border-color: black; width: 100%;">Login</button>
                </div>
                <div class="col-sm-12 my-3"> <!-- Agregado espacio debajo del botón de login -->
                    <p class="text-center">¿Necesitas ayuda?</p>
                </div>
            </div>
        </div>
    </form>
</div>

