<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('partials/_styles.php') ?>
    <title> CINE+ | Registrase </title>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center mb-5">
                <img src="../public/images/imagen_registro.svg" class="w-75 content-register-left">
            </div>
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                <div class="card shadow content-register-right">
                    <div class="card-body">
                        <h5 class="card-title">Registro</h5>
                        <form method="post" id="form_register">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombres" autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-user-alt"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellidos">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-user-alt"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Correo" autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-envelope"></i> </span>
                                </div>
                            </div>
                            <p id="email_error" class="text-danger"></p>
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-phone"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" name="password"  placeholder="Contraseña" id="password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-lock"></i> </span>
                                </div>
                            </div>
                            <p id="password_error" class="text-danger"></p>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" placeholder="Repetir Contraseña"  id="passsword_confirm">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-lock"></i> </span>
                                </div>
                            </div>
                            <!--  Seccion escondida  -->
                            <div class="d-none" id="seccion_vip">
                                <p class="text-secondary"> <i class="fas fa-hand-point-down"></i> Nunca des este numero <i class="fas fa-hand-point-down"></i> </p>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="text" placeholder="Tarjeta" id="tarjeta" readonly name="tarjeta">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="my-addon"> <i class="fas fa-credit-card"></i> </span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" id="nacimiento" type="date" placeholder="Fecha nacimiento" name="nacimiento">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="my-addon"> <i class="fas fa-calendar-alt"></i> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ser_vip" name="ser_vip">
                                    <label class="form-check-label" for="gridCheck">
                                        Ser vip
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"> Registrarse </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/user/register.js" type="module"></script>
</body>

</html>