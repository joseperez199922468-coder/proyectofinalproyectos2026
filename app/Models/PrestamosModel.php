<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestamosModel extends Model
{
    protected $table            = 'prestamos';
    protected $primaryKey       = 'id_prestamo';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_usuario',
        'fecha_prestamo',
        'fecha_devolucion_previa',
        'fecha_devolucion',
        'estado',
        'observaciones'
    ];
}
