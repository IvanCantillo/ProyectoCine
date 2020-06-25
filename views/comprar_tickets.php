<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Comprar Ticket para <?= $resMovie['nombre'] ?></title>
    <?php require_once('partials/_styles.php') ?>
</head>


<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-11 mx-auto" id="lista_sillas">
                <input type="hidden" id="id_pelicula" value="<?= $resMovie['id'] ?>">
                <h3 class="text-center mt-3 mb-4"> Comprar tickets para la pelicula <b><?= $resMovie['nombre'] ?></b> </h3>
                <section class="row justify-content-center">
                    <div class="col mx-auto mb-4 text-center">
                        <span class="mx-2"> <i class="fas fa-couch text-danger"></i> Ocupado</span>
                        <span class="mx-2"> <i class="fas fa-couch text-primary"></i> Desocupado</span>
                        <span class="mx-2"> <i class="fas fa-couch text-success"></i> Seleccionado</span>
                    </div>
                </section>
                <div class="row mb-4 justify-content-center">
                    <?php $break = 0;
                    foreach ($resChair as $key) : ?>
                        <?php if ($break == 20) : ?>
                </div>
                <div class="row mb-4 justify-content-center">
                    <?php if ($key['fk_estado_funcion_' . $horario] == 1) : ?>
                        <section class="text-center">
                            <span id="<?= $key['silla'] ?>" class="ml-3 text-primary silla"> <i class="fas fa-couch"></i> </span>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <?= $key['silla'] ?>
                                </div>
                            </div>
                        </section>

                    <?php else : ?>

                        <section class="text-center">
                            <span id="<?= $ey['silla'] ?>" class="ml-3 text-primary"> <i class="fas fa-couch"></i> </span>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <?= $key['silla'] ?>
                                </div>
                            </div>
                        </section>

                    <?php endif ?>
                    <?php $break = 1; ?>
                <?php else : ?>

                    <?php if ($key['fk_estado_funcion_'.$horario] == 1) : ?>
                        <section class="text-center">
                            <span id="<?= $key['silla'] ?>" class="ml-3 text-primary silla"> <i class="fas fa-couch"></i> </span>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <?= $key['silla'] ?>
                                </div>
                            </div>
                        </section>

                    <?php else : ?>

                        <section class="text-center">
                            <span id="<?= $key['silla'] ?>" class="ml-3 text-danger"> <i class="fas fa-couch"></i> </span>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <?= $key['silla'] ?>
                                </div>
                            </div>
                        </section>

                    <?php endif ?>
                    <?php $break++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <div class="card overflow-auto" style="height: 16.3em;">
                    <div class="card-body">
                        <h5 class="card-title">Silla(s) Seleccionadas</h5>
                        <div class="text-center" id="sillas_seleccionadas">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                <div class="card" style="height: 16.3em;">
                    <div class=" card-body">
                    <h5 class="card-title"> Total de la compra </h5>
                    <div class="d-flex justify-content-between">
                        <span>Valor</span>
                        <span id="valor">$0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Descuento por sillas</span>
                        <span id="descuento">$0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Descuento por tarjeta</span>
                        <span id="descuento_tarjeta">$0</span>
                    </div>
                    <?php if($_SESSION['usuario']['rol'] != 3): ?>
                    <a href="#" id="verificar_tarjeta"> Verificar tarjeta <i class="fas fa-angle-down"></i></a>
                    <form id="form_verificar_tarjeta">
                        <div class="input-group d-none" id="div_verificar"> 
                            <input class="form-control" type="text" id="tarjeta" name="tarjeta" placeholder="Numero de tarjeta" value="">
                            <div class="input-group-append">
                                <button class="input-group-text bg-header text-white" id="btn_verificar" type="submit"> <i class="fas fa-check"></i> </button>
                            </div>
                        </div>
                        <p class="text-danger" id="error_tarjeta"> </p>
                    </form>

                    <?php endif ?>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Total....</span>
                        <span id="total">$0</span>
                    </div>
                    <button class="btn btn-success btn-block mt-4" disabled id="comprar" data-toggle="modal" data-target="#exampleModal"> Comprar </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" id="nombre_pelicula" value="<?= $resMovie['nombre'] ?>">
    <div id="modal">
        
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/comprar/silla.js" type="module"></script>
</body>

</html>