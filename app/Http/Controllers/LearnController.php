<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;

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

        $user = Auth::user();
        if(!$user){
            //abort(404, 'Usuario no autenticado.');
            return view("dashboard.learn.{$carpeta}.introduction", [
            'carpeta'   => $carpeta,
            'idActual'  => 'introduction',
            'secciones' => $secciones
        ]);
        }
        
        //UNIDAD 1
        if($carpeta == "html"){
            
        }else if($carpeta == 'css'){


        }else if($carpeta == 'js'){
            $requirements = [
                'u3-varcons' => 0,
                'u3-aritmetica' => 10,
                'u3-ifelse' => 20,
                'u3-ternario' => 30,
                'u3-switch' => 40,
                'u3-loops' => 50,
                'u3-funciones' => 60,
                'u3-document' => 70
            ];
            if(array_key_exists($id, $requirements)){
                $needed = $requirements[$id];
                $unit = Unit::where('order', 3)->first();
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }

                $percentage = $user->units()->where('unit_id', $unit->id)->first()?->pivot->percentage ?? 0;
                if($percentage < $needed) {

                    return view("dashboard.learn.{$carpeta}.introduction", [
                        'carpeta'   => $carpeta,
                        'idActual'  => 'introduction',
                        'secciones' => $secciones
                    ]);
                }
            }
        }else if($carpeta == 'php'){


        }

        return view("dashboard.learn.{$carpeta}.[id]", [
            'carpeta'   => $carpeta,
            'idActual'  => $id,
            'seccion'   => $secciones[$id],
            'secciones' => $secciones
        ]);
    }

    public function completarSeccion(Request $request){
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        $carpeta = $request->input('carpeta');
        $seccionId = $request->input('seccion_id');

        //UNIDAD 1
        if($carpeta == "html"){
            
        }else if($carpeta == 'css'){


        }else if($carpeta == 'js'){
            $requirements = [
                'u3-varcons'    => 10,
                'u3-aritmetica' => 20,
                'u3-ifelse'     => 30,
                'u3-ternario'   => 40,
                'u3-switch'     => 50,
                'u3-loops'      => 60,
                'u3-funciones'  => 70,
                'u3-document'   => 80
            ];
            if(array_key_exists($seccionId, $requirements)){
                $should = $requirements[$seccionId];

                $unit = Unit::where('order', 3)->first();
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }

                $percentage = $user->units()->where('unit_id', $unit->id)->first()?->pivot->percentage ?? 0;
                if($percentage < $should) {
                    $user->units()->updateExistingPivot($unit->id, [
                        'percentage' => $should
                    ]);
                }
            }
        }else if($carpeta == 'php'){


        }

        return response()->json([
            'message' => 'Progreso actualizado',
            'carpeta' => $carpeta,
            'seccion' => $seccionId
        ]);
    }



    public function getProgressNeeded(string $carpeta): array {
        $map = [
            'js' => [
                'u3-varcons'    => 10,
                'u3-aritmetica' => 20,
                'u3-ifelse'     => 30,
                'u3-ternario'   => 40,
                'u3-switch'     => 50,
                'u3-loops'      => 60,
                'u3-funciones'  => 70,
                'u3-document'   => 80,
            ],
        ];
        return $map[$carpeta] ?? [];
    } 

  
}