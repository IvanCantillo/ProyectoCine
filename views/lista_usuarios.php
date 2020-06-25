<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Lista de usuarios</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8 mx-auto">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nombre </th>
                            <th> Rol </th>
                            <th> Estado </th>
                            <th colspan="2" class="text-center"> Opciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($resUsers as $user) : ?>
                            <tr>
                                <td> <?= $i++; ?> </td>
                                <td> <?= $user['nombre'] . " " . $user['apellido'] ?> </td>
                                <td> <?= $user['rol'] ?> </td>
                                <td> <?= ($user['fk_estado'] == 1) ? 'Activo' : 'Inactivo' ?> </td>
                                <td class="text-center">
                                    <form action="<?= URL_BASE ?>admin/editar" method="POST">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button type="submit" class="btn btn-info"> <i class="fas fa-pen"></i> </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" onclick="deleteUser( <?= $user['id'] ?>, '<?= URL_BASE ?>' )" data-toggle="modal" data-target="#modal<?= $user['id'] ?>"> <i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modal">

    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../public/js/modals.js"></script>
</body>

</html>
