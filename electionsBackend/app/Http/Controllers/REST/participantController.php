<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Throwable;

class participantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participant = participant::all();
        return response()->json($participant, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'nom' => 'required|max:20',
                'num_cni' => 'required|max:20',
                'age' => 'required|max:100',
                'sexe' => 'required|max:5',
                'id_region' => 'required|max:2',
                'login' => 'required|max:20',
                'pwd' => 'required|max:20',
                'email' => 'required|max:20|unique:participant',
                'tel' => 'required|max:20',
            ]
        );

        try {
            DB::beginTransaction();
            $participant = participant::create([
                'nom' => $request->nom,
                'num_cni' => $request->num_cni,
                'age' => $request->age,
                'sexe' => $request->sexe,
                'id_region' => $request->id_region,
                'login' => $request->login,
                'pwd' => Hash::make($request->pwd),
                'email' => $request->email,
                'tel' => $request->tel,
            ]);
            DB::commit();
            return response()->json($participant, 201);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json("{'error: Imposible de sauvegarder'}", 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(participant $participant)
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
            $participant = participant::find($id);
            $participant->update($request->all());
            response()->json("{'Modification réussie du participant'}", 200);
            return $participant;
        } catch (Throwable $error) {
            dd($error);
            return response()->json("{'error: Imposible de mettre a jour le participant'}", 404);
        }
    }

    public function onoff($id)
    {
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            $participant->etat = !($participant->etat);
            $participant->update();
            DB::commit();
            return response()->json("{'Activation du participant réussie'}", 200);
        } catch (Throwable $error) {
            dd($error);
            return response()->json("{'Participant non activé'}", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $participant = participant::find($id);
            $participant->delete();
            return response()->json("{'Suppresion réussie du participant'}", 200);
        } catch (Throwable $error) {
            dd($error);
            return response()->json("{'error: Imposible de Supprimé'}", 404);
        }
    }
}
