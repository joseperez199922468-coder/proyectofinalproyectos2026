<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Préstamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <main class="container-fluid px-2 py-2">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h4 mb-0">Préstamos</h1>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearPrestamo">Agregar préstamo</button>
        </div>

        <?php if ($success = session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= esc($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif ?>

        <?php if ($error = session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif ?>

        <?php $validationErrors = session()->getFlashdata('errors') ?? []; ?>
        <?php if ($validationErrors): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($validationErrors as $validationError): ?>
                        <li><?= esc($validationError) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="table-responsive border-top pt-2">
            <table class="table table-bordered table-striped table-hover table-sm align-middle text-center mb-0">
                <thead>
                    <tr>
                        <th scope="col">Id_prestamo</th>
                        <th scope="col">Id_usuario</th>
                        <th scope="col">Fecha prestamo</th>
                        <th scope="col">Fecha devolucion previa</th>
                        <th scope="col">Fecha devolucion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($datos)): ?>
                        <tr>
                            <td colspan="8" class="py-4 text-body-secondary">No hay préstamos registrados.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($datos as $prestamo): ?>
                            <tr>
                                <td><?= esc($prestamo['id_prestamo']) ?></td>
                                <td><?= esc($prestamo['id_usuario']) ?></td>
                                <td><?= esc($prestamo['fecha_prestamo']) ?></td>
                                <td><?= esc($prestamo['fecha_devolucion_previa'] ?? '—') ?></td>
                                <td><?= esc($prestamo['fecha_devolucion'] ?? '—') ?></td>
                                <td><?= esc($prestamo['estado'] ?? '—') ?></td>
                                <td class="text-start"><?= esc($prestamo['observaciones'] ?? '—') ?></td>
                                <td class="text-nowrap">
                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary btn-sm py-0 px-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editarPrestamo"
                                        data-id="<?= esc($prestamo['id_prestamo'], 'attr') ?>"
                                        data-usuario="<?= esc($prestamo['id_usuario'], 'attr') ?>"
                                        data-fecha-prestamo="<?= esc($prestamo['fecha_prestamo'], 'attr') ?>"
                                        data-fecha-previa="<?= esc($prestamo['fecha_devolucion_previa'] ?? '', 'attr') ?>"
                                        data-fecha-devolucion="<?= esc($prestamo['fecha_devolucion'] ?? '', 'attr') ?>"
                                        data-estado="<?= esc($prestamo['estado'] ?? 'Prestado', 'attr') ?>"
                                        data-observaciones="<?= esc($prestamo['observaciones'] ?? '', 'attr') ?>"
                                        aria-label="Editar préstamo <?= esc($prestamo['id_prestamo'], 'attr') ?>"
                                        title="Editar"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-9.5 9.5a.5.5 0 0 1-.22.127l-5 1.5a.5.5 0 0 1-.62-.62l1.5-5a.5.5 0 0 1 .127-.22l9.5-9.5zM11.207 2 14 4.793 15.293 3.5 12.5.707 11.207 2zm2.086 3.5L10.5 2.707l-7.5 7.5V12h1.793l8.5-8.5z"/>
                                        </svg>
                                    </button>
                                    <form method="post" action="<?= site_url('prestamos/eliminar/' . $prestamo['id_prestamo']) ?>" class="d-inline" onsubmit="return confirm('¿Eliminar este préstamo?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-1" aria-label="Eliminar préstamo <?= esc($prestamo['id_prestamo'], 'attr') ?>" title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2H5.5l.5-1h4l.5 1h3a1 1 0 0 1 1 1zM4 4v9a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4H4z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="crearPrestamo" tabindex="-1" aria-labelledby="crearPrestamoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form method="post" action="<?= site_url('prestamos/crear') ?>">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="crearPrestamoLabel">Agregar préstamo</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="crearUsuario" class="form-label">Usuario</label>
                                <select class="form-select" id="crearUsuario" name="id_usuario" required>
                                    <option value="">Selecciona un usuario</option>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <option value="<?= esc($usuario['id_usuario'], 'attr') ?>"><?= esc($usuario['nombre'] . ' ' . $usuario['apellidos']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="crearFechaPrestamo" class="form-label">Fecha préstamo</label>
                                <input type="date" class="form-control" id="crearFechaPrestamo" name="fecha_prestamo" value="<?= esc(date('Y-m-d'), 'attr') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="crearFechaPrevia" class="form-label">Fecha devolución previa</label>
                                <input type="date" class="form-control" id="crearFechaPrevia" name="fecha_devolucion_previa">
                            </div>
                            <div class="col-md-6">
                                <label for="crearFechaDevolucion" class="form-label">Fecha devolución</label>
                                <input type="date" class="form-control" id="crearFechaDevolucion" name="fecha_devolucion">
                            </div>
                            <div class="col-md-6">
                                <label for="crearEstado" class="form-label">Estado</label>
                                <select class="form-select" id="crearEstado" name="estado" required>
                                    <option value="Prestado">Prestado</option>
                                    <option value="Devuelto">Devuelto</option>
                                    <option value="Atrasado">Atrasado</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="crearObservaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" id="crearObservaciones" name="observaciones" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar préstamo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarPrestamo" tabindex="-1" aria-labelledby="editarPrestamoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form method="post" id="formEditarPrestamo">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="editarPrestamoLabel">Editar préstamo</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="editarUsuario" class="form-label">Usuario</label>
                                <select class="form-select" id="editarUsuario" name="id_usuario" required>
                                    <option value="">Selecciona un usuario</option>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <option value="<?= esc($usuario['id_usuario'], 'attr') ?>"><?= esc($usuario['nombre'] . ' ' . $usuario['apellidos']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editarFechaPrestamo" class="form-label">Fecha préstamo</label>
                                <input type="date" class="form-control" id="editarFechaPrestamo" name="fecha_prestamo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editarFechaPrevia" class="form-label">Fecha devolución previa</label>
                                <input type="date" class="form-control" id="editarFechaPrevia" name="fecha_devolucion_previa">
                            </div>
                            <div class="col-md-6">
                                <label for="editarFechaDevolucion" class="form-label">Fecha devolución</label>
                                <input type="date" class="form-control" id="editarFechaDevolucion" name="fecha_devolucion">
                            </div>
                            <div class="col-md-6">
                                <label for="editarEstado" class="form-label">Estado</label>
                                <select class="form-select" id="editarEstado" name="estado" required>
                                    <option value="Prestado">Prestado</option>
                                    <option value="Devuelto">Devuelto</option>
                                    <option value="Atrasado">Atrasado</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="editarObservaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" id="editarObservaciones" name="observaciones" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        document.getElementById('editarPrestamo').addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const modal = event.currentTarget;
            const id = button.dataset.id;

            modal.querySelector('#formEditarPrestamo').action = `<?= site_url('prestamos/actualizar') ?>/${id}`;
            modal.querySelector('#editarUsuario').value = button.dataset.usuario;
            modal.querySelector('#editarFechaPrestamo').value = button.dataset.fechaPrestamo;
            modal.querySelector('#editarFechaPrevia').value = button.dataset.fechaPrevia;
            modal.querySelector('#editarFechaDevolucion').value = button.dataset.fechaDevolucion;
            modal.querySelector('#editarEstado').value = button.dataset.estado;
            modal.querySelector('#editarObservaciones').value = button.dataset.observaciones;
        });
    </script>
</body>
</html>
