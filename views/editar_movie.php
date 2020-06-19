<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar <?= $resMovie['nombre'] ?></title>

    <?php require_once('partials/_styles.php') ?>
    <?php require_once('partials/_navbar.php') ?>
</head>

<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-12 my-4">
                <h1 class="text-center mb-4">Editar pelicula </h1>
                <div class="row">
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-8  mx-auto mt-4">
                        <form action="<?= URL_BASE ?>Movie/actualizar" method="POST">
                            
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Nombre</h5>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $resMovie['nombre'] ?>">
                              </div>
                            </div>

                            <div class="form-group row">  
                              <div class="col-sm-10">
                                <h5>Trailer</h5>
                                <input type="text" class="form-control" id="trailer" name="trailer" value="<?= $resMovie['trailer'] ?>">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Imagen</h5>
                                  <input type="text" class="form-control" id="imagen" name="imagen" value="<?= $resMovie['imagen'] ?>">
                                </div>
                              </div>

                            <div class="form-group row">
                            <div class="col-sm-10">
                              <h5>Sala</h5>
                                <input type="text" class="form-control" id="sala" name="sala" value="<?= $resMovie['fk_sala'] ?>">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Duracion en minutos</h5>
                                  <input type="text" class="form-control" id="duracion" name="duracion" value="<?= $resMovie['duracion'] ?>">
                                </div>
                              </div>

                            <div class="form-group row">
                            <div class="col-sm-10">
                              <textarea name="descripcion" id="" cols="60" rows="10">
                               <?php echo $resMovie['descripcion'] ?>
                              </textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $resMovie['id'] ?>">
                              </div>
                            </div>
                             
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
                            </div>
                          
                              
                          </form>
            
                    
                    </div>
                </div>
            </div>
        </div>
</div>


</body>

    
    <?php require_once('partials/_footer.php') ?>
    <?php require_once('partials/_modals.php') ?>