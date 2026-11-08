<?php

namespace App\Controllers;

use App\Models\DetallePrestamosModel;

class DetallePrestamosController extends BaseController
{
    public function index(): string
    {
        $prestamo = new DetallePrestamosModel();
        $datos['datos'] = $prestamo->findAll();

        return view('detalleprestamos', $datos);
    }

    public function insertar()
    {
        $datos = [
            'id_detalle'        => $this->request->getPost('txt_detalle'),
            'id_prestamo'       => $this->request->getPost('txt_prestamo'),
            'id_recurso'        => $this->request->getPost('txt_recurso'),
            'cantidad'          => $this->request->getPost('txt_cantidad'),
            'estado_salida'     => $this->request->getPost('txt_salida'),
            'estado_devolucion' => $this->request->getPost('txt_devolucion'),
            'observaciones'     => $this->request->getPost('txt_observaciones'),
        ];

        $prestamo = new DetallePrestamosModel();
        $prestamo->insert($datos);

        return redirect()->to(base_url('prestamos'));
    }

    public function eliminar($codigo)
    {
        $prestamo = new DetallePrestamosModel();
        $prestamo->delete($codigo);

        return redirect()->to(base_url('prestamos'));
    }

    public function buscar($codigo)
    {
        $prestamo = new DetallePrestamosModel();
        $datos['datos'] = $prestamo->find($codigo);

        return view('form_modificar_detallesPrestamos',$datos);
    }

    public function modificar()
    {
        $prestamo = new DetallePrestamosModel();
        $codigo = $this->request->getPost('txt_detalle');

        $datos = [
            'id_detalle'        => $this->request->getPost('txt_detalle'),
            'id_prestamo'       => $this->request->getPost('txt_prestamo'),
            'id_recurso'        => $this->request->getPost('txt_recurso'),
            'cantidad'          => $this->request->getPost('txt_cantidad'),
            'estado_salida'     => $this->request->getPost('txt_salida'),
            'estado_devolucion' => $this->request->getPost('txt_devolucion'),
            'observaciones'     => $this->request->getPost('txt_observaciones'),
        ];

        $prestamo->update($codigo, $datos);

        return redirect()->to(base_url('detalleprestamos'));
    }
}