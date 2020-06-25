<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINE+ | Reporte</title>
    <?php require_once('partials/_styles.php') ?>
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid container-top mb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8 mx-auto">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Usuario </th>
                            <th> Pelicula </th>
                            <th> Cantidad </th>
                            <th> Desc. silla </th>
                            <th> Desc. tarjeta </th>
                            <th> Precio </th>
                            <th> Fecha </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($resReporte as $reporte) : ?>
                            <tr>
                                <td> <?= $i++; ?> </td>
                                <td> <?= $reporte['nombre_usuario'] ?> </td>
                                <td> <?= $reporte['nombre_pelicula'] ?> </td>
                                <td class="text-right"> <?= $reporte['cantidad'] ?> </td>
                                <td class="text-right"> <?= $reporte['descuento_silla'] ?> </td>
                                <td class="text-right"> <?= $reporte['descuento_tarjeta'] ?> </td>
                                <td class="text-right"> $<?= $reporte['precio'] ?> </td>
                                <td> <?= $reporte['fecha_creacion'] ?> </td>
                                <td class="text-right"> $<?= $reporte['total'] ?> </td>
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
    <script src=" https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js "></script>
    <script src=" https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js "></script>
    <script src="../public/js/modals.js"></script>
    <script>
        $(document).ready(function() {
            $.extend(true, $.fn.dataTable.defaults, {
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoPostFix": "",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "loadingRecords": "Cargando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "searchPlaceholder": "Término de búsqueda",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay registro de ventas",
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    //only works for built-in buttons, not for custom buttons
                    "buttons": {
                        "create": "Nuevo",
                        "edit": "Cambiar",
                        "remove": "Borrar",
                        "copy": "Copiar",
                        "csv": "fichero CSV",
                        "excel": "tabla Excel",
                        "pdf": "documento PDF",
                        "print": "Imprimir",
                        "colvis": "Visibilidad columnas",
                        "collection": "Colección",
                        "upload": "Seleccione fichero...."
                    },
                    "select": {
                        "rows": {
                            _: '%d filas seleccionadas',
                            0: 'clic fila para seleccionar',
                            1: 'una fila seleccionada'
                        }
                    }
                }
            });
            $('#example').DataTable();
        });
    </script>
</body>

</html>