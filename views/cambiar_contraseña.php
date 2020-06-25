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
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><b>Cambiar contraseña</b></h5>
            <hr>
            <form action="<?= URL_BASE ?>User/actualizarpassword" class="mx-auto" method="POST">
              <div class="row">
                <div class="col-11 mx-auto">
                  <div class="form-group">
                    <input type="text" class="form-control" id="pass_nueva" name="nuevapass" placeholder="Nueva contraseña">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="r_pass_nueva" placeholder="Repetir contraseña">
                    <small class="text-danger" id="error"></small>
                  </div>
                </div>
              </div>
              <div class="justify-content-center d-flex">
                <button type="button" class="btn btn-primary" id="validar">Aceptar</button>
                <button type="submit" class="btn btn-warning d-none" id="update">Actualizar</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div id="modal">

  </div>
  <?php require_once('partials/_footer.php') ?>
  <script src="../public/js/user/password.js"></script>
</body>

</html>