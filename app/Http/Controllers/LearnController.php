<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class LearnController extends Controller
{
    private function obtenerSecciones()
    {
        $path = public_path('data/secciones.json');
        return File::exists($path) ? json_decode(File::get($path), true) : [];
    }

    public function mostrarSeccion($id = 'introduccion')
    {
        $secciones = $this->obtenerSecciones();

        if (!array_key_exists($id, $secciones)) {
            abort(404, 'La sección no existe.');
        }

        return view('dashboard.learn.html.[id]', [
            'idActual'  => $id,
            'seccion'   => $secciones[$id],
            'secciones' => $secciones
        ]);
    }

    public function index()
    {
        return view('dashboard.learn.html.index', [
            'idActual'  => 'index',
            'secciones' => $this->obtenerSecciones()
        ]);
    }

    public function intro()
    {
        return view('dashboard.learn.html.introduction', [
            'idActual'  => 'introduction',
            'secciones' => $this->obtenerSecciones()
        ]);
    }
}
