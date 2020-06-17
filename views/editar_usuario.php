<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('partials/_styles.php') ?>
    <title> CINE+ | Editar a <?= $resUser['nombre'] ?> </title>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Editar Usuario</h5>
                        <form method="post" id="form_edit">
                            <input type="hidden" name="id" value="<?= $resUser['id'] ?>">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombres" value="<?= $resUser['nombre'] ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-user-alt"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellidos"  value="<?= $resUser['apellido'] ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-user-alt"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Correo" autocomplete="off"  value="<?= $resUser['email'] ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-envelope"></i> </span>
                                </div>
                            </div>
                            <p id="email_error" class="text-danger"></p>
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" autocomplete="off"  value="<?= $resUser['telefono'] ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon"> <i class="fas fa-phone"></i> </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <select class="form-control" name="rol" id="rol">
                                    <option value="<?= $resUser['fk_rol'] ?>"> <?= $resUser['rol'] ?> </option>
                                    <option value="3"> User </option>
                                    <option value="2"> Vip </option>
                                    <option value="1"> Admin </option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <select class="form-control" name="estado" id="estado">
                                    <option value="<?= $resUser['fk_estado']  ?>"> <?= ($resUser['fk_estado'] == 1) ? 'Activo' : 'Inactivo' ?> </option>
                                    <option value="2"> Inactivo </option>
                                    <option value="1"> Activo </option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"> Actualizar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/user/edit_user.js" type="module"></script>
</body>

</html>