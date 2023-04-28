<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $region = Region::all();
        return response()->json($region, 200);
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
            $region = Region::create([
                'label' => $request->label,
            ]);
            DB::commit();
            return response()->json($region, 201);
        } catch (\Throwable $th) {
            return response()->json("{'error: Imposible de sauvegarder une région'}", 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $region = Region::find($id);
            $region->update($request->all());
            response()->json("{'Modification réussie de la région'}", 200);
            return $region;
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de mettre a jour la région'}", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $region = Region::find($id);
            $region->delete();
            return response()->json("{'Suppresion réussie de la région'}", 200);
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de supprimé la région'}", 404);
        }
    }
}
