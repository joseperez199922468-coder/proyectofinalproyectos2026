<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <form action="<?= base_url('modificar_detallePrestamos'); ?>" method="post">
            <label for="txt_detalle" class="form-label">Id de Detalle</label>
            <input type="number" name="txt_detalle" id="txt_detalle" class="form-control"  value="<?=$datos['id_detalle'];?>">
            <label for="txt_prestamo" class="form-label">Id de Prestamo</label>
            <input type="number" name="txt_prestamo" id="txt_prestamo" class="form-control"  value="<?=$datos['id_prestamo'];?>">
            <label for="txt_recurso" class="form-label">Id de Recurso</label>
            <input type="text" name="txt_recurso" id="txt_recurso" class="form-control"  value="<?=$datos['id_recurso'];?>">
            <label for="txt_cantidad" class="form-label">Cantidad</label>
            <input type="number" name="txt_cantidad" id="txt_cantidad" class="form-control"   value="<?=$datos['cantidad'];?>">
            <label for="txt_salida" class="form-label">Estado de salida</label>
            <input type="text" name="txt_salida" id="txt_salida" class="form-control"   value="<?=$datos['estado_salida'];?>">
            <label for="txt_devolucion" class="form-label">Estado devolucion</label>
            <input type="text" name="txt_devolucion" id="txt_devolucion" class="form-control"  value="<?=$datos['estado_devolucion'];?>">
            <label for="txt_observaciones" class="form-label">Observaciones</label>
            <input type="text" name="txt_observaciones" id="txt_observaciones" class="form-control"  value="<?=$datos['observaciones'];?>">    
            <button type="submit" class="btn btn-primary form-control mt-2">Guardar</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</body>

</html>