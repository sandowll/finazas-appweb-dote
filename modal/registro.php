<!-- Formulario de Registro -->
<div id="modal2-wrapper" class="modal" style="background-color: rgba(0, 0, 0, 0.5);">
    <form class="modal-content animate container d-flex justify-content-center align-items-center rounded" action="bancoregistro.php" method="POST" style="max-width: 400px;">
        <div class="imgcontainer">
            <span onclick="document.getElementById('modal2-wrapper').style.display='none'" class="close" title="Close PopUp" style="font-size: 24px;">&times;</span>
            <hr style="border-top: 1px solid #ccc; width: 100%; margin-bottom: 20px;">
            <div class="text-center mb-4">
            <div class="text-center mb-4">
                <img src="./imagenes/logo/logo.svg" alt="Logo" class="img-fluid shadow-sm rounded-circle" style="width: 60px; height: 60px;">
            </div>
            <h1 class="card-title text-center mb-4 fw-bold text-uppercase lh-1" style="font-family: 'Montserrat', sans-serif; letter-spacing: 3px;">DOTE CAJA MONETARIA</h1>
            </div>
            <div class="container">
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="text" name="realname" class="form-control" placeholder="Usuario" required="">
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="email" name="nick" class="form-control" placeholder="Email" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 my-1">
                        <div class="input-group">
                            <select class="form-control" name="tdocumento" required="">
                                <option selected>Tipo de cuenta</option>
                                <option value="cedula de ciudadania">Monetaria</option>
                                <option value="cedula extranjera">Ahorro</option>
                                <option value="Numero unico de identificación personal">Infantil</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 my-1">
                        <div class="input-group">
                            <input type="text" name="documento" class="form-control" placeholder="Cedula" required="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="">
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <div class="input-group">
                        <input type="password" name="rpass" class="form-control" placeholder="Repetir contraseña" required="">
                    </div>
                </div>
                <div class="col-sm-12 my-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" required=""> click para continuar
                    </label>
                </div>
                <button type="submit" class="btn btn-warning px-5" style="background-color: #f3df00; color: black; border-color: black; width: 100%;">Registrar</button>
                <div class="col-sm-12 my-3"> <!-- Espacio debajo del botón de registrar -->
                <p class="text-center">¿Utiliza ocho caracteres con una combinacion de letras numeros y simbolos?</p>
            </div>
            </div>
        </div>
    </form>
</div>
