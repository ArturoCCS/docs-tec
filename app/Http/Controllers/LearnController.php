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
        /*
        if (!array_key_exists($id, $secciones) || ($id !== 'index' || $id !== 'introduccion')) {
            abort(404, 'La sección no existe.');
        }
            */
        
        $user = Auth::user();
        $percentage = 0;
        
        if(!$user){
            //abort(404, 'Usuario no autenticado.');
            return view("dashboard.learn.{$carpeta}.introduction", [
            'carpeta'   => $carpeta,
            'idActual'  => 'introduction',
            'secciones' => $secciones
            ]);
        }

        $unit = $this->getUnidadPorCarpeta($carpeta);
        if($unit){
            $pivot = $user->units()->where('unit_id', $unit->id)->first();
            $percentage = $pivot ? $pivot->pivot->percentage : 0;
        }

        if ($id === 'index') {
            return view("dashboard.learn.{$carpeta}.index", [
                'carpeta'   => $carpeta,
                'idActual'  => $id,
                'secciones' => $secciones,
                'porcentaje' => $percentage
            ]);
        }

        if ($id === 'introduction') {
                return view("dashboard.learn.{$carpeta}.introduction", [
                'carpeta'   => $carpeta,
                'idActual'  => $id,
                'secciones' => $secciones
            ]);
        }
        
        //UNIDAD 1
        if($carpeta == "html"){
            
        }else if($carpeta == 'css'){


        }else if($carpeta == 'js'){
            $requirements = self::requiredListJS();
            if(array_key_exists($id, $requirements)){
                $needed = $requirements[$id];
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }
                if($percentage < $needed) {
                    return view("dashboard.learn.{$carpeta}.introduction", [
                        'carpeta'   => $carpeta,
                        'idActual'  => 'introduction',
                        'secciones' => $secciones
                    ]);
                }
            }
        }else if($carpeta == 'php'){
            $requirements = self::requiredListPHP();
            if(array_key_exists($id, $requirements)){
                $needed = self::requiredPHP($id);
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }
                if($percentage < $needed) {

                    return view("dashboard.learn.{$carpeta}.introduction", [
                        'carpeta'   => $carpeta,
                        'idActual'  => 'introduction',
                        'secciones' => $secciones
                    ]);
                }
            }
            



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

            $completed = self::completedListJS();
            if(array_key_exists($seccionId, $completed)){
                $should = self::completedJS($seccionId);

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

            $completed = self::completedListPHP();
            if(array_key_exists($seccionId, $completed)){
                $should = self::completedPHP($seccionId);

                $unit = Unit::where('order', 4)->first();
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }

                $percentage = $user->units()->where('unit_id', $unit->id)->first()?->pivot->percentage ?? 0;
                if($percentage < $should) {
                    $user->units()->updateExistingPivot($unit->id, [
                        'percentage' => $should
                    ]);
                }
            }

        }

        return response()->json([
            'message' => 'Progreso actualizado',
            'carpeta' => $carpeta,
            'seccion' => $seccionId
        ]);
    }



    private function getUnidadPorCarpeta(string $carpeta): ?Unit{
        $orderMap = ['html' => 1, 'css' => 2, 'js' => 3, 'php' => 4];
        $order = $orderMap[$carpeta] ?? null;
        return $order ? Unit::where('order', $order)->first() : null;
    }


    public static function requiredJS($seccion){
        $requirements = self::requiredListJS();
        return $requirements[$seccion] ?? 0;
    }
    public static function completedJS($seccion){
        $completed = self::completedListJS();
        return $completed[$seccion] ?? 0;
    }
    public static function requiredPHP($seccion){
        $requirements = self::requiredListPHP();
        return $requirements[$seccion] ?? 0;
    }
    public static function completedPHP($seccion){
        $completed = self::completedListPHP();
        return $completed[$seccion] ?? 0;
    }
    public static function requiredListJS() {
        return [
            'u3-varcons'    => 0,
            'u3-aritmetica' => 10,
            'u3-ifelse'     => 20,
            'u3-ternario'   => 30,
            'u3-switch'     => 40,
            'u3-loops'      => 50,
            'u3-funciones'  => 60,
            'u3-document'   => 70
        ];
    }
    public static function completedListJS(){
        return [
            'u3-varcons'    => 10,
            'u3-aritmetica' => 20,
            'u3-ifelse'     => 30,
            'u3-ternario'   => 40,
            'u3-switch'     => 50,
            'u3-loops'      => 60,
            'u3-funciones'  => 70,
            'u3-document'   => 80
        ];
    }

    public static function requiredListPHP() {
        return [
            'sintaxis'              => 0,
            'variables'             => 5,
            'salida-datos'          => 10,
            'condicionales'         => 20,
            'operadores-comparacion'=> 30,
            'operadores-logicos'    => 40,
            'switch'                => 50,
            'bucles'                => 60,
            'funciones'             => 70,
            'formularios'           => 80
        ];
    }
    public static function completedListPHP() {
        return [
            'sintaxis'              => 5,
            'variables'             => 10,
            'salida-datos'          => 20,
            'condicionales'         => 30,
            'operadores-comparacion'=> 40,
            'operadores-logicos'    => 50,
            'switch'                => 60,
            'bucles'                => 70,
            'funciones'             => 80,
            'formularios'           => 90
        ];
    }

  
}