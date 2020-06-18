<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('partials/_styles.php') ?>
    <title>CINE+ | Peliculas</title>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container container-top">
        <div class="row">
            <div class="col mb-3">
                <h3> Peliculas en cartelera </h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($resMoviesCartelera as $movie) : ?>
                <div class="col-6 col-md-4 col-xl-4 col-lg-4 mb-4">
                <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                        <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                        <button type="submit" class="btn btn-block cards-movies-cartelera"> <img src="<?= $movie['imagen'] ?>" class="w-100 height-card-movie" loading="lazy"> </button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col mb-3">
                <h3> Proximos extrenos </h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($resMoviesExtreno as $movie) : ?>
                <div class="col-6 col-md-4 col-xl-4 col-lg-4 mb-4">
                    <form action="<?= URL_BASE ?>inicio/detalle" method="post">
                        <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                        <button type="submit" class="btn btn-block cards-movies-extreno"> <img src="<?= $movie['imagen'] ?>" class="w-100 height-card-movie"> </button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
</body>

</html>