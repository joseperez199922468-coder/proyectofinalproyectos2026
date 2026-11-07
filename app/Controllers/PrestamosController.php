<?php

namespace App\Controllers;

use App\Models\PrestamosModel;

class PrestamosController extends BaseController
{
    public function index(): string
    {
        $model = new PrestamosModel();

        return view('prestamos', [
            'datos' => $model
            ->select('prestamos.*, CONCAT(usuarios.nombre, " ", usuarios.apellidos) AS usuario')
            ->join('usuarios', 'usuarios.id_usuario = prestamos.id_usuario')
            ->findAll(),
            'usuarios' => db_connect()
            ->table('usuarios')
            ->select('id_usuario, nombre, apellidos')
            ->orderBy('nombre')
            ->get()
            ->getResultArray(),
        ]);
    }

    public function crear(): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new PrestamosModel();

        if (! $this->validateLoan($this->datosFormulario())) {
            return redirect()->to('/prestamos')->with('errors', $this->validator->getErrors());
        }

        if (! $model->insert($this->datosFormulario())) {
            return redirect()->back()->withInput()->with('error', 'No se pudo guardar el préstamo.');
        }

        return redirect()->to('/prestamos')->with('success', 'Préstamo agregado correctamente.');
    }

    public function actualizar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new PrestamosModel();

        if ($model->find($id) === null) {
            return redirect()->to('/prestamos')->with('error', 'El préstamo solicitado no existe.');
        }

        if (! $this->validateLoan($this->datosFormulario())) {
            return redirect()->to('/prestamos')->with('errors', $this->validator->getErrors());
        }

        if (! $model->update($id, $this->datosFormulario())) {
            return redirect()->back()->withInput()->with('error', 'No se pudo actualizar el préstamo.');
        }

        return redirect()->to('/prestamos')->with('success', 'Préstamo actualizado correctamente.');
    }

    public function eliminar(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new PrestamosModel();

        if ($model->find($id) === null) {
            return redirect()->to('/prestamos')->with('error', 'El préstamo solicitado no existe.');
        }

        if (! $model->delete($id)) {
            return redirect()->to('/prestamos')->with('error', 'No se pudo eliminar el préstamo.');
        }

        return redirect()->to('/prestamos')->with('success', 'Préstamo eliminado correctamente.');
    }

    private function datosFormulario(): array
    {
        return [
            'id_usuario' => $this->request->getPost('id_usuario'),
            'fecha_prestamo' => $this->request->getPost('fecha_prestamo'),
            'fecha_devolucion_previa' => $this->request->getPost('fecha_devolucion_previa') ?: null,
            'fecha_devolucion' => $this->request->getPost('fecha_devolucion') ?: null,
            'estado' => $this->request->getPost('estado'),
            'observaciones' => $this->request->getPost('observaciones') ?: null,
        ];
    }

    private function validateLoan(array $data): bool
    {
        return $this->validateData($data, [
            'id_usuario' => 'required|is_natural_no_zero|is_not_unique[usuarios.id_usuario]',
            'fecha_prestamo' => 'required|valid_date[Y-m-d]',
            'fecha_devolucion_previa' => 'permit_empty|valid_date[Y-m-d]',
            'fecha_devolucion' => 'permit_empty|valid_date[Y-m-d]',
            'estado' => 'required|in_list[Prestado,Devuelto,Atrasado]',
        ], [
            'id_usuario' => ['is_not_unique' => 'Selecciona un usuario existente.'],
            'fecha_prestamo' => [
                'required' => 'La fecha del préstamo es obligatoria.',
                'valid_date' => 'Ingresa una fecha de préstamo válida.',
            ],
            'fecha_devolucion_previa' => ['valid_date' => 'Ingresa una fecha de devolución previa válida.'],
            'fecha_devolucion' => ['valid_date' => 'Ingresa una fecha de devolución válida.'],
            'estado' => ['in_list' => 'Selecciona un estado válido.'],
        ]);
    }
}