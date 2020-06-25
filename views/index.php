<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+</title>
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../public/images/logo.png"/> -->
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <img id="img-banner" src="https://cdn.pixabay.com/photo/2019/02/27/02/22/theater-4023278_1280.jpg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-4">
                <h1 class="text-center mb-4"> Mas populares </h1>
                <div class="row">
                    <div class="col">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row justify-content-center">
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>Inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_1[0]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_1[0]['imagen'] ?>" title="<?= $seccion_1[0]['nombre'] ?>" alt="<?= $seccion_1[0]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_1[0]['id'] ?>" class="w-100 height-card-movie"></button>
                                            </form>
                                        </div>
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_1[1]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_1[1]['imagen'] ?>" title="<?= $seccion_1[1]['nombre'] ?>" alt="<?= $seccion_1[1]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_1[1]['id'] ?>" class="w-100 height-card-movie"></button>
                                            </form>
                                        </div>
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_1[2]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_1[2]['imagen'] ?>" title="<?= $seccion_1[2]['nombre'] ?>" alt="<?= $seccion_1[2]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_1[2]['id'] ?>" class="w-100 height-card-movie"></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row justify-content-center">
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_2[0]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_2[0]['imagen'] ?>" title="<?= $seccion_2[0]['nombre'] ?>" alt="<?= $seccion_2[0]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_2[0]['id'] ?>" class="w-100 height-card-movie"></button>
                                            </form>
                                        </div>
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_2[1]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_2[1]['imagen'] ?>" alt="<?= $seccion_2[1]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_2[1]['id'] ?>" class="w-100 height-card-movie" alt="..."></button>
                                            </form>
                                        </div>
                                        <div class="col-4 col-md-3 col-lg-3 col-xl-3">
                                            <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                                                <input type="hidden" name="id" value="<?= $seccion_2[2]['id'] ?>">
                                                <button type="submit" class="btn"><img src="<?= $seccion_2[2]['imagen'] ?>" alt="<?= $seccion_2[2]['nombre'] ?>" data-toggle="modal" data-target="#modal_<?= $seccion_2[2]['id'] ?>" class="w-100 height-card-movie" alt="..."></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="rounded-circle bg-primary py-1 px-2"> <i class="fas fa-arrow-left"></i> </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="rounded-circle bg-primary py-1 px-2"> <i class="fas fa-arrow-right"></i> </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-xl-3 col-lg-3 mx-auto mt-4">
                        <form action="<?= URL_BASE ?>inicio/peliculas" method="post">
                            <button type="submit" class="btn btn-primary btn-block"> Ver todas las peliculas </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <?php require_once('partials/_modals.php') ?>