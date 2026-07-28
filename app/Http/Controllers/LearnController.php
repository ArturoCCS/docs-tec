<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class LearnController extends Controller
{
    private function obtenerSecciones(string $carpeta)
    {
        $path = public_path("data/{$carpeta}_secciones.json");
        return File::exists($path) ? json_decode(File::get($path), true) : [];
    }

    public function mostrarSeccion(string $carpeta, $id = 'introduccion')
    {
        $secciones = $this->obtenerSecciones($carpeta);

        if ($id === 'index') {
            return view("dashboard.learn.{$carpeta}.index", [
                'carpeta'   => $carpeta,
                'idActual'  => $id,
                'secciones' => $secciones
            ]);
        }

        if ($id === 'introduction') {
                return view("dashboard.learn.{$carpeta}.introduction", [
                'carpeta'   => $carpeta,
                'idActual'  => $id,
                'secciones' => $secciones
            ]);
        }


        if (!array_key_exists($id, $secciones)) {
            abort(404, 'La sección no existe.');
        }

        return view("dashboard.learn.{$carpeta}.[id]", [
            'carpeta'   => $carpeta,
            'idActual'  => $id,
            'seccion'   => $secciones[$id],
            'secciones' => $secciones
        ]);
    }

  
}