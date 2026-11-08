<?php

namespace App\Models;

use CodeIgniter\Model;

class DetallePrestamosModel extends Model
{
    protected $table            = 'detalle_prestamos';
    protected $primaryKey       = 'id_detalle';
    protected $allowedFields    = [
        'id_detalle',
        'id_prestamo',
        'id_recurso',
        'cantidad',
        'estado_salida',
        'estado_devolucion',
        'observaciones'
    ];


}
