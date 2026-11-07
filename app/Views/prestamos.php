<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thaed>
            <tr>
                <th>id_prestamo</th>
                <th>id_usuario</th>
                <th>Fecha_prestamo</th>
                <th>Fecha_devolucion_previa</th>
                <th>Fecha_devolucion</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thaed>
        <tbody>
            <?php    
            foreach ($datos as $prestamos) {
            ?>
            <tr>
                <td>   <?= $prestamos['id_prestamo']; ?>         </td>
                <td>  <?= $prestamos['id_usuario']; ?>          </td>
                <td>   <?= $prestamos['fecha_prestamo']; ?>      </td>
                <td>   <?= $prestamos['fecha_devolucion_previa']; ?></td>
                <td>   <?= $prestamos['fecha_devolucion']; ?>    </td>
                <td>   <?= $prestamos['estado']; ?></td>
                <td>   <?= $prestamos['observaciones']; ?>       </td>
                <td>Actualizar / Eliminar</td>
            </tr>
            <?php   
                }
            ?>
        </tbody>
    </table>
</body>
</html>