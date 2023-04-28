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
            'couleur' => 'required|max:100',
            'photo' => 'required|max:100',
        ]);

        try {
            DB::beginTransaction();
            $bulletin = Bulletin::create([
                'couleur' => $request->couleur,
                'photo' => $request->photo,
            ]);
            DB::commit();
            return response()->json($bulletin, 201);
        } catch (\Throwable $th) {
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
    public function update(Request $request, $id)
    {
        //
        try {
            $bulletin = Bulletin::find($id);
            $bulletin->update($request->all());
            response()->json("{'Modification réussie du bulletin'}", 200);
            return $bulletin;
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de mettre a jour le bulletin'}", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $bulletin = Bulletin::find($id);
            $bulletin->delete();
            return response()->json("{'Suppresion réussie du bulletin'}", 200);
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de supprimé le bulletin'}", 404);
        }
    }
}
