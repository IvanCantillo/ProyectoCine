<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Asignar peliculas</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8 mx-auto">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="row mb-2">
                            <div class="col-12 text-center">
                                <h2> Asignar peliculas a las salas </h2>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1>Sala 1</h1>
                                <form action="<?= URL_BASE.'Admin/asignamiento' ?>" method="POST">
                                <select class="form-control" id="horario" name="sala_1">
                                    <option value="1"> Seleccionar pelicula </option>
                                    <?php foreach ($resPeliculas as $pelicula) : ?>
                                        <option value="<?= $pelicula['id'] ?>"> <?= $pelicula['nombre'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1>Sala 2</h1>
                                <select class="form-control" id="horario" name="sala_2">
                                    <option value="2"> Seleccionar pelicula </option>
                                    <?php foreach ($resPeliculas as $pelicula) : ?>
                                        <option value="<?= $pelicula['id'] ?>"> <?= $pelicula['nombre'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1>Sala 3</h1>
                                <select class="form-control" id="horario" name="sala_3">
                                    <option value="3"> Seleccionar pelicula </option>
                                    <?php foreach ($resPeliculas as $pelicula) : ?>
                                        <option value="<?= $pelicula['id'] ?>"> <?= $pelicula['nombre'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                                
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success">Asignar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal">



    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/modals.js"></script>
</body>

</html>