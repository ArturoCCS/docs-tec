<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlocklyController extends Controller
{
    public function index()
    {
        $categorias = ['html', 'css', 'js'];
        
        $bloquesPorCategoria = [];
        $toolboxesPorCategoria = [];

        foreach ($categorias as $cat) {
            $blocksPath = resource_path("blocks/blocks_{$cat}.json");
            $toolboxPath = resource_path("blocks/toolbox_{$cat}.json");

            $bloquesPorCategoria[$cat] = file_exists($blocksPath) 
                ? json_decode(file_get_contents($blocksPath), true) 
                : [];

            $toolboxesPorCategoria[$cat] = file_exists($toolboxPath) 
                ? json_decode(file_get_contents($toolboxPath), true) 
                : ["kind" => "categoryToolbox", "contents" => []];
        }


        $configPath = resource_path("blocks/blockly_config.json");
        $configuracion = file_exists($configPath) 
            ? json_decode(file_get_contents($configPath), true) 
            : [];

        return view('dashboard.learn.html', [
            'bloques'   => $bloquesPorCategoria,
            'toolboxes' => $toolboxesPorCategoria,
            'config'    => $configuracion
        ]);
    }

    public function hero(){
                $categorias = ['html', 'css', 'js'];
        
        $bloquesPorCategoria = [];
        $toolboxesPorCategoria = [];

        foreach ($categorias as $cat) {
            $blocksPath = resource_path("blocks/blocks_{$cat}.json");
            $toolboxPath = resource_path("blocks/toolbox_{$cat}.json");

            $bloquesPorCategoria[$cat] = file_exists($blocksPath) 
                ? json_decode(file_get_contents($blocksPath), true) 
                : [];

            $toolboxesPorCategoria[$cat] = file_exists($toolboxPath) 
                ? json_decode(file_get_contents($toolboxPath), true) 
                : ["kind" => "categoryToolbox", "contents" => []];
        }


        $configPath = resource_path("blocks/blockly_config.json");
        $configuracion = file_exists($configPath) 
            ? json_decode(file_get_contents($configPath), true) 
            : [];

        return view('index', [
            'bloques2'   => $bloquesPorCategoria,
            'toolboxes2' => $toolboxesPorCategoria,
            'config2'    => $configuracion
        ]);
    }
}