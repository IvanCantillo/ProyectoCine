<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear pelicula </title>

    <?php require_once('partials/_styles.php') ?>
    <?php require_once('partials/_navbar.php') ?>
</head>

<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-12 my-4">
                <h1 class="text-center mb-4">Crear pelicula </h1>
                <div class="row">
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-8  mx-auto mt-4">
                        <form action="<?= URL_BASE ?>Movie/insertar" method="POST">
                            
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Nombre</h5>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                              </div>
                            </div>

                            <div class="form-group row">  
                              <div class="col-sm-10">
                                <h5>Trailer</h5>
                                <input type="text" class="form-control" id="trailer" name="trailer">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Imagen</h5>
                                  <input type="text" class="form-control" id="imagen" name="imagen">
                                </div>
                              </div>

                            <div class="form-group row">
                            <div class="col-sm-10">
                              <h5>Sala</h5>
                                <input type="text" class="form-control" id="sala" name="sala">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-10">
                                <h5>Duracion en minutos</h5>
                                  <input type="text" class="form-control" id="duracion" name="duracion"">
                                </div>
                              </div>

                            <div class="form-group row">
                            <div class="col-sm-10">
                                <h5>Descripcion </h5>
                              <textarea name="descripcion" id="" cols="60" rows="10">
                               
                              </textarea>
                            </div>
                          </div>
   
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success" name="crear">Crear</button>
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