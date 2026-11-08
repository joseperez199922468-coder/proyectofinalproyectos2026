<?php $assetBase = rtrim(config('App')->baseURL, '/') . '/'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Préstamos - Gestión Didáctica</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="<?= esc($assetBase . 'css/style.css', 'attr') ?>">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('datatables/datatables.min.css')?>">
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <header class="encabezado">
        <h3>Pestaña de Inicio de Sesión</h3>
    </header>

    <div class="container-fluid px-4 py-3 flex-grow-1">
        
        <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom">
            <div>
                <h1 class="fw-bold mb-1" style="color: #0b1b3d;">Detalle de Préstamos</h1>
                <p class="text-muted mb-0">Gestión de Material Didáctico - Cornerstone International School</p>
            </div>
            <!-- Logo oficial -->
            <img src="<?= esc($assetBase . 'img/logo-cornerstone.png', 'attr') ?>" class="logo" alt="Logo Cornerstone" style="max-height: 60px;">
        </div>

        <div class="mb-4">
            <a href="<?= base_url('/') ?>" class="btn btn-primary me-2">Menú</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Detalle de préstamos
            </button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Detalle de Préstamo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('agregar_prestamos'); ?>" method="post">
                            <label for="txt_detalle" class="form-label">Id de Detalle</label>
                            <input type="number" name="txt_detalle" id="txt_detalle" class="form-control" required>

                            <label for="txt_prestamo" class="form-label">Id de Préstamo</label>
                            <input type="number" name="txt_prestamo" id="txt_prestamo" class="form-control" required>

                            <label for="txt_recurso" class="form-label">Id de Recurso</label>
                            <input type="text" name="txt_recurso" id="txt_recurso" class="form-control" required>

                            <label for="txt_cantidad" class="form-label">Cantidad</label>
                            <input type="number" name="txt_cantidad" id="txt_cantidad" class="form-control" required>

                            <label for="txt_salida" class="form-label">Estado de salida</label>
                            <input type="text" name="txt_salida" id="txt_salida" class="form-control">

                            <label for="txt_devolucion" class="form-label">Estado devolución</label>
                            <input type="text" name="txt_devolucion" id="txt_devolucion" class="form-control">

                            <label for="txt_observaciones" class="form-label">Observaciones</label>
                            <input type="text" name="txt_observaciones" id="txt_observaciones" class="form-control">

                            <button type="submit" class="btn btn-primary form-control mt-3">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered text-center align-middle m-0" id="dataTable" style="width:100%">
                        <thead class="text-white" style="background-color: #0b1b3d;">
                            <tr>
                                <th>Id Detalle</th>
                                <th>Id Préstamo</th>
                                <th>Id Recurso</th>
                                <th>Cantidad</th>
                                <th>Estado de salida</th>
                                <th>Estado Devolución</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $prestamo) { ?>
                            <tr>
                                <td class="fw-bold"><?=$prestamo['id_detalle'];?></td>
                                <td><?=$prestamo['id_prestamo'];?></td>
                                <td><?=$prestamo['id_recurso'];?></td>
                                <td><span class="badge bg-secondary"><?=$prestamo['cantidad'];?></span></td>
                                
                                <td>
                                    <?php 
                                        $salida = strtolower(trim($prestamo['estado_salida']));
                                        if (str_contains($salida, 'excelente') || str_contains($salida, 'bueno')) {
                                            echo '<span class="badge bg-success">' . $prestamo['estado_salida'] . '</span>';
                                        } elseif (str_contains($salida, 'pendiente')) {
                                            echo '<span class="badge bg-warning text-dark">' . $prestamo['estado_salida'] . '</span>';
                                        } else {
                                            echo '<span class="badge bg-info text-dark">' . $prestamo['estado_salida'] . '</span>';
                                        }
                                    ?>
                                </td>

                                <td>
                                    <?php 
                                        $devolucion = strtolower(trim($prestamo['estado_devolucion']));
                                        if (str_contains($devolucion, 'excelente') || str_contains($devolucion, 'bueno') || str_contains($devolucion, 'devuelto')) {
                                            echo '<span class="badge bg-success">' . $prestamo['estado_devolucion'] . '</span>';
                                        } elseif (str_contains($devolucion, 'pendiente')) {
                                            echo '<span class="badge bg-warning text-dark">' . $prestamo['estado_devolucion'] . '</span>';
                                        } elseif (str_contains($devolucion, 'atrasado') || str_contains($devolucion, 'dañado')) {
                                            echo '<span class="badge bg-danger">' . $prestamo['estado_devolucion'] . '</span>';
                                        } else {
                                            echo '<span class="badge bg-secondary">' . $prestamo['estado_devolucion'] . '</span>';
                                        }
                                    ?>
                                </td>

                                <td class="text-start"><?=$prestamo['observaciones'];?></td>
                                
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?=base_url('buscar_prestamos/').$prestamo['id_detalle'];?>" class="btn btn-warning me-1">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <a href="<?=base_url('eliminar_prestamos/').$prestamo['id_detalle'];?>" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar este registro?');">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <footer>
        Guatemala, San Raymundo.
    </footer>
    
    <script src="<?= base_url('js/jquery-3.5.1.js') ?>"></script>
    
    <!-- datatables JS -->
    <script type="text/javascript" src="<?= base_url('datatables/datatables.min.js')?>"></script>
    
    <!-- para usar botones en datatables JS -->
    <script src="<?= base_url('datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('datatables/JSZip-2.5.0/jszip.min.js')?>"></script>
    <script src="<?= base_url('datatables/pdfmake-0.1.36/pdfmake.min.js')?>"></script>
    <script src="<?= base_url('datatables/pdfmake-0.1.36/vfs_fonts.js')?>"></script>
    <script src="<?= base_url('datatables/Buttons-1.5.6/js/buttons.html5.min.js')?>"></script>
    
    <!-- código JS propìo (Nombres elementos de datatable en español)-->
    <script type="text/javascript" src="<?= base_url('js/main.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>