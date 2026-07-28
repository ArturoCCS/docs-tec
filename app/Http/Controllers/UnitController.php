<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;

class UnitController extends Controller
{

    public function create(){
        return view('create-unit');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer|min:0',
        ]);

        $unit = Unit::create($validated);
        
        //$user = Auth::user();
        //$user->units()->attach($unit->id, ['percentage' => 12]);

        return redirect('/units')->with('success', 'Unidad creada');
    }



    public function index(): JsonResponse {
        $user = Auth::user();
        if(!$user) return response()->json(['message'=> 'User no Autenticado'], 401);

        $units = Unit::orderBy('order')->get()
            ->map(function ($unit) use ($user) {
                $progress = $user->units()->where('unit_id', $unit->id)->first();
                $unit->percentage = $progress ? $progress->pivot->percentage : 0;
                return $unit;
            });

        return response()->json($units);
    }

    public function show($id): JsonResponse {
        $user = Auth::user();
        if(!$user) return response()->json(['message'=> 'User no Autenticado'], 401);

        $unit = Unit::findOrFail($id);
        $progress = $user->units()->where('unit_id', $unit->id)->first();
        $unit->percentage = $progress ? $progress->pivot->percentage : 0;

        return response()->json($unit);
    }

    public function updateProgress($unitId) {
        //$request->validate(['percentage' => 'required|integer|min:0|max:100',]);

        $user = Auth::user();
        if (!$user) return response()->json(['message' => 'No autenticado'], 401);
        
        $unit = Unit::findOrFail(1);

        $user->units()->syncWithoutDetaching([
            $unit->id => ['percentage' => $unitId],
        ]);

        return redirect('/units');
    }
}
