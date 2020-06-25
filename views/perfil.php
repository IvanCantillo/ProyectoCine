<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Lista de usuarios</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8 mx-auto">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-right mb-2">
                            <a href="<?= URL_BASE . 'User/passwordreset' ?>" id='actualizar_perfil'><i class="fas fa-edit" title="Editar"></i> Cambiar contraseña </a>
                        </div>
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../public/images/images_profile.png" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"> <?= $_SESSION['usuario']['nombre'] ?> </h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col"> <b>Telefono</b> </div>
                                    <div class="col text-right"> <?= $_SESSION['usuario']['telefono'] ?> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col"> <b>Tarjeta</b> </div>
                                    <div class="col text-right"> <?= $_SESSION['usuario']['tarjeta'] != '' ? $_SESSION['usuario']['tarjeta'] : 'No tienes' ?> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col"> <b>Correo</b> </div>
                                    <div class="col text-right"> <?= $_SESSION['usuario']['correo'] ?> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col"> <b>Rol</b> </div>
                                    <?php if( $_SESSION['usuario']['rol'] == 3 ): ?>
                                        <?php if( $_SESSION['usuario']['estado_vip'] == 2 ): ?>
                                            <div class="col text-right">
                                                <form action="<?= URL_BASE. 'user/user_vip' ?>" method="POST">
                                                    <input type="text" class="d-none" value="<?= $_SESSION['usuario']['id'] ?>" name="id">
                                                    <input type="text" class="d-none" value="true" name="usuario">
                                                    <button type="submit" class="btn btn-warning">Solicitar ser VIP</button>
                                                </form>
                                            </div>
                                        <?php else: ?>
                                            <div class="col text-right"> Solicitud en proceso... </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col text-right"> <?= ($_SESSION['usuario']['rol'] == 2) ? 'Vip' : 'User' ?> </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <li class="list-group-item text-center">
                                <button type="button" id="actualizar_modal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Actualizar datos </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= URL_BASE ?>User/updatePerfil" method="POST">
                        <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <h5>Nombre</h5>
                                        <input type="text" class="form-control" id="upda_nombre" name="upda_nombre" value="<?= $_SESSION['usuario']['nombre_usu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <h5>Apellido</h5>
                                        <input type="text" class="form-control" id="upda_nombre" name="upda_apellido" value="<?= $_SESSION['usuario']['apellido_usu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <h5>Email</h5>
                                        <input type="text" class="form-control" id="upda_email" name="upda_email" value="<?= $_SESSION['usuario']['correo'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <h5>Telefono</h5>
                                        <input type="text" class="form-control" id="upda_telefono" name="upda_telefono" value="<?= $_SESSION['usuario']['telefono'] ?>">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/modals.js"></script>
</body>

</html>P