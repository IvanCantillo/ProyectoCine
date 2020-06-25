<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Solicitudes VIP</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top">
        <div class="row">
            <div class="col-12 col-sm-8 col-lg-7 col-xl-6 mx-auto">
                <ul class="list-group list-group-unbordered mb-3">
                    <?php if ($resSolicitudes->rowCount() > 0) : ?>
                        <?php foreach ($resSolicitudes as $solicitud) : ?>
                            <li class="list-group-item mb-2">
                                <div class="row">
                                    <div class="col">
                                        <b><?= $solicitud['nombre'] . " " . $solicitud['apellido'] ?></b>
                                        <p>Ha solicitado ser un usuario VIP</p>
                                    </div>
                                    <div class="col text-right my-auto">
                                        <button class="btn btn-primary" onclick="aceptar_solicitud( '<?= URL_BASE ?>', <?= $solicitud['id'] ?> )"> Aceptar </button>
                                        <button class="btn btn-danger" onclick="eliminar_solicitud( '<?= URL_BASE ?>', <?= $solicitud['id'] ?> )"> Rechazar </button>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="list-group-item mb-2 text-center">
                            <h3><b> No hay solicitudes pendientes </b></h3>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/admin/solicitudes_vip.js"></script>
</body>