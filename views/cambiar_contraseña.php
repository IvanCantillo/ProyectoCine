<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Cambiar Contraseña</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8 mx-auto">

                <form action="<?= URL_BASE ?>User/actualizarpassword" method="POST">

                            <div class="form-group row">  
                              <div class="col-sm-10">
                                <h5>Nueva</h5>
                                <input type="text" class="form-control" id="pass_nueva" name="nuevapass">
                              </div>
                            </div>

                            <div class="form-group row">  
                              <div class="col-sm-10">
                                <h5>Repita a nueva</h5>
                                <input type="text" class="form-control" id="r_pass_nueva">
                                <small style="color: red;" class="d-none" id="error">Las contraseñas no coinciden</small>
                              </div>
                            </div>

                            <center>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" id="validar">Aceptar</button>
                                    <button type="submit" class="btn btn-warning d-none" id="update">Actualizar</button>
                                </div>
                            </center>

                           
                          
                              
                          </form>

                
            </div>
        </div>
    </div>
    <div id="modal">

    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/user/password.js"></script>
</body>

</html>
