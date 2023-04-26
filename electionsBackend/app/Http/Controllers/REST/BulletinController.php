<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bulletin = Bulletin::all();
        return response()->json($bulletin, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'label' => 'required|max:30',
        ]);

        try {
            DB::beginTransaction();
            $bulletin = Bulletin::create([
                'couleur' => $request->label,
                'photo' => $request->label,
            ]);
            DB::commit();
            return response()->json($bulletin, 201);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json("{'error: Imposible de sauvegarder une bulletin'}", 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bulletin $bulletin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bulletin $bulletin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bulletin $bulletin)
    {
        //
    }
}
