<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Registro de Préstamos</title>
    <!-- Bootstrap 5 fácil de usar para que se vea ordenado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Encabezado simple -->
    <div class="container text-center my-4">
        <h2>Sistema de Préstamos</h2>
        <p class="text-muted">Panel de control de préstamos de recursos</p>
    </div>

    <div class="container">
        <div class="row">

            <!-- COLUMNA IZQUIERDA: Formulario para ingresar un registro -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Nuevo Préstamo</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('detalleprestamos/guardar') ?>" method="POST">
                            
                            <div class="mb-3">
                                <label for="id_prestamo" class="form-label">ID Préstamo:</label>
                                <input type="number" name="id_prestamo" id="id_prestamo" class="form-control" required placeholder="Ej: 1">
                            </div>

                            <div class="mb-3">
                                <label for="id_recurso" class="form-label">ID Recurso:</label>
                                <input type="number" name="id_recurso" id="id_recurso" class="form-control" required placeholder="Ej: 3">
                            </div>

                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" required placeholder="Ej: 1">
                            </div>

                            <div class="mb-3">
                                <label for="estado_salida" class="form-label">Estado de Salida:</label>
                                <input type="text" name="estado_salida" id="estado_salida" class="form-control" required placeholder="Ej: Bueno">
                            </div>

                            <div class="mb-3">
                                <label for="estado_devolucion" class="form-label">Estado de Devolución:</label>
                                <input type="text" name="estado_devolucion" id="estado_devolucion" class="form-control" required placeholder="Ej: Pendiente">
                            </div>

                            <div class="mb-3">
                                <label for="observaciones" class="form-label">Observaciones:</label>
                                <textarea name="observaciones" id="observaciones" class="form-control" rows="2" placeholder="Notas adicionales..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Guardar Registro</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA: Tabla con los datos guardados -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Lista de Préstamos Registrados</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Préstamo</th>
                                        <th>Recurso</th>
                                        <th>Cant.</th>
                                        <th>Salida</th>
                                        <th>Devolución</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($detalles)): ?>
                                        <?php foreach ($detalles as $row): ?>
                                            <tr>
                                                <td><b><?= $row['id_detalle'] ?></b></td>
                                                <td><?= $row['id_prestamo'] ?></td>
                                                <td><?= $row['id_recurso'] ?></td>
                                                <td><?= $row['cantidad'] ?></td>
                                                <td><?= esc($row['estado_salida']) ?></td>
                                                <td><?= esc($row['estado_devolucion']) ?></td>
                                                <td><?= esc($row['observaciones']) ?></td>
                                                <td>
                                                    <a href="<?= site_url('detalleprestamos/editar/' . $row['id_detalle']) ?>" class="btn btn-warning btn-sm mb-1">Editar</a>
                                                    <a href="<?= site_url('detalleprestamos/eliminar/' . $row['id_detalle']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este registro?');">Borrar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No hay registros guardados. ¡Agrega el primero desde el formulario!</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>