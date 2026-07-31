<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;

class LearnController extends Controller
{   

    public function dashboard() {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'No autenticado'], 401);
        }
        $units = Unit::orderBy('order')->with(['users' => function ($q) use ($user) {
            $q->where('user_id', $user->id);
        }])->get();
        $unitsData = $units->map(function ($unit) use ($user){
            $pivot = $unit->users->first()?->pivot;

            $progress   = $pivot->percentage ?? 0;
            $updatedAt  = $pivot->updated_at ?? null;

                $carpetaMap = [
                    'HTML' => 'html',
                    'CSS'  => 'css',
                    'JS' => 'js',
                    'PHP'  => 'php',
                ];
            return [
                'id'        => $unit->id,
                'name'      => $unit->title,
                'order'     => $unit->order,
                'progress'  => $progress,
                'carpeta'    => $carpetaMap[$unit->title] ?? 'null',
                'updated_at' => $updatedAt
            ];
        });
        $cursosActivos = $unitsData->filter(function ($unit) {
            return $unit['progress'] > 0 && $unit['progress'] < 100;
        })->count();
        $ultimaLeccion = $unitsData->pluck('updated_at')->filter()->max();


        return view('dashboard.index', [
            'user'  => $user,
            'units' => $unitsData,
            'activeCourses' => $cursosActivos,
            'lastLesson' => $ultimaLeccion
        ]);
    }

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

        if ($carpeta === 'html') {
            $id = 'index';
        }

        $user = Auth::user();
        $percentage = 0;

        if(!$user){
            //abort(404, 'Usuario no autenticado.');
            if ($carpeta !== 'html') {
                return view("dashboard.learn.{$carpeta}.introduction", [
                'carpeta'   => $carpeta,
                'idActual'  => 'introduction',
                'secciones' => $secciones
                ]);
            }
        }

        $unit = $this->getUnidadPorCarpeta($carpeta);
        if($unit && $user){
            $pivot = $user->units()->where('unit_id', $unit->id)->first();
            $percentage = $pivot ? $pivot->pivot->percentage : 0;
        }


        if ($id === 'index') {
            switch($carpeta){
            case "html":
                foreach ($secciones as $clave => $datos) {
                    $secciones[$clave]['required'] = self::requiredHTML($clave);
                }
                break;
            case "css":
                foreach ($secciones as $clave => $datos) {
                    $secciones[$clave]['required'] = self::requiredCSS($clave);
                }
                break;
            case "js":
                foreach ($secciones as $clave => $datos) {
                    $secciones[$clave]['required'] = self::requiredJS($clave);
                }
                break;
            case "php":
                foreach ($secciones as $clave => $datos) {
                    $secciones[$clave]['required'] = self::requiredPHP($clave);
                }
                break;
            default:
            
            } 


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
            //NO HAY ID PAGES
        }else if($carpeta == 'css'){
            $requirements = self::requiredListCSS();
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

            $completed = self::completedListHTML();
            if (array_key_exists($seccionId, $completed)) {
                $should = self::completedHTML($seccionId);
                
                $unit = Unit::where('order', 1)->first();
                if (!$unit) { abort(404, 'Unidad no encontrada :('); }
                $percentage = $user->units()->where('unit_id', $unit->id)->first()?->pivot->percentage ?? 0;
                if ($percentage < $should) {
                    $user->units()->updateExistingPivot($unit->id, ['percentage' => $should]);
                }
            }
        }else if($carpeta == 'css'){

            $completed = self::completedListCSS();
            if(array_key_exists($seccionId, $completed)){
                $should = self::completedCSS($seccionId);

                $unit = Unit::where('order', 2)->first();
                if(!$unit) { abort(404, 'Unidad no encontrada :('); }

                $percentage = $user->units()->where('unit_id', $unit->id)->first()?->pivot->percentage ?? 0;
                if($percentage < $should) {
                    $user->units()->updateExistingPivot($unit->id, [
                        'percentage' => $should
                    ]);
                }
            }

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


    public static function requiredHTML($seccion){
        $requirements = self::requiredListHTML();
        return $requirements[$seccion] ?? 0;
    }
    public static function completedHTML($seccion){
        $completed = self::completedListHTML();
        return $completed[$seccion] ?? 0;
    }
    public static function requiredCSS($seccion){
        $requirements = self::requiredListCSS();
        return $requirements[$seccion] ?? 0;
    }
    public static function completedCSS($seccion){
        $completed = self::completedListCSS();
        return $completed[$seccion] ?? 0;
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


    public static function requiredListHTML() {
        return [
            'estructura'    => 0,
            'texto'         => 10,
            'semantica'     => 20,
            'enlaces'       => 30,
            'listas'        => 40,
            'tablas'        => 50,
            'formularios'   => 60,
            'citas'         => 70,
            'interactivos'  => 80,
            'generales'     => 90
        ];
    }
    public static function completedListHTML() {
        return [
            'estructura'    => 10,
            'texto'         => 20,
            'semantica'     => 30,
            'enlaces'       => 40,
            'listas'        => 50,
            'tablas'        => 60,
            'formularios'   => 70,
            'citas'         => 80,
            'interactivos'  => 90,
            'generales'     => 100
        ];
    }

    public static function requiredListCSS() {
        return [
            'selectores'        => 0,
            'fuente'            => 10,
            'fondo'             => 20,
            'dimensiones'       => 30,
            'bordes'            => 40,
            'espaciado'         => 50,
            'transformaciones'  => 60,
            'pseudoclases'      => 70,
            'practica'          => 80
        ];
    }

    public static function completedListCSS() {
        return [
            'selectores'        => 10,
            'fuente'            => 20,
            'fondo'             => 30,
            'dimensiones'       => 40,
            'bordes'            => 50,
            'espaciado'         => 60,
            'transformaciones'  => 70,
            'pseudoclases'      => 80,
            'practica'          => 100
        ];
    }

    public static function requiredListJS() {
        return [
            'u3-varcons'    => 0,
            'u3-aritmetica' => 10,
            'u3-ifelse'     => 30,
            'u3-ternario'   => 40,
            'u3-switch'     => 50,
            'u3-loops'      => 70,
            'u3-funciones'  => 80,
            'u3-document'   => 90
        ];
    }
    public static function completedListJS(){
        return [
            'u3-varcons'    => 10,
            'u3-aritmetica' => 30,
            'u3-ifelse'     => 40,
            'u3-ternario'   => 50,
            'u3-switch'     => 70,
            'u3-loops'      => 80,
            'u3-funciones'  => 90,
            'u3-document'   => 100
        ];
    }

    public static function requiredListPHP() {
        return [
            'sintaxis'              => 0,
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
    public static function completedListPHP() {
        return [
            'sintaxis'              => 10,
            'variables'             => 20,
            'salida-datos'          => 30,
            'condicionales'         => 40,
            'operadores-comparacion'=> 50,
            'operadores-logicos'    => 60,
            'switch'                => 70,
            'bucles'                => 80,
            'funciones'             => 90,
            'formularios'           => 100
        ];
    }

  
}