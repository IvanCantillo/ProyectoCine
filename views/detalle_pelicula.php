<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | <?= $resMovie['nombre'] ?></title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col mb-3">
                <h4 class="text-uppercase font-weight-bold"> <?= $resMovie['nombre'] ?> </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-xl-5 col-lg-6 d-flex justify-content-center mb-2">
                <img src="<?= $resMovie['imagen'] ?>" class="img-fluid w-100" style="height: 26.5em;">
            </div>
            <div class="col-12 col-md-7 col-xl-7 col-lg-6">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="<?= $resMovie['trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-10 text-left mx-auto">
                <h4 class="font-weight-bold"> Sinopsis </h4>
                <p><?= $resMovie['descripcion'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto mt-4">
                <form action="<?= URL_BASE ?>comprar/index" method="post">
                    <input type="hidden" name="id" value="<?= $resMovie['id'] ?>">
                    <button type="submit" class="btn btn-success btn-block" <?= $resMovie['fk_sala'] == '' ? 'disabled' : NULL ?>> <?= $resMovie['fk_sala'] == '' ? 'Proximamente...' : 'Seleccionar Sillas' ?> </button>
                </form>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
</body>

</html>