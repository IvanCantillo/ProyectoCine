<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('partials/_styles.php') ?>
    <title> CINE+ | Iniciar Session </title>
</head>
<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center mb-5">
                <img src="../public/images/imagen_login.svg" class="w-75 content-register-left">
            </div>
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                <div class="card shadow content-register-right">
                    <div class="card-body">
                        <h5 class="card-title">Iniciar sesion</h5>
                        <form method="post" action="<?= URL_BASE ?>user/test" id="form_login">
                            <div class="input-group mb-2">
                                <input class="form-control" type="email" name="email" placeholder="Ingresa tu correo" autofocus autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="far fa-envelope"></i> </span>
                                </div>
                            </div>
                            <p id="email_error" class="text-danger"></p>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-lock"></i> </span>
                                </div>
                            </div>
                            <p id="password_error" class="text-danger"></p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"> Ingresar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/user/login.js" type="module"></script>
</body>
</html>