<?php

namespace App\Controllers;
use App\Models\PrestamosModel;

class PrestamosController extends BaseController
{
    public function index(): string
    {
        $prestamo = new PrestamosModel();
        $datos['datos'] = $prestamo->findAll();
        return view('prestamos', $datos);
    }
}