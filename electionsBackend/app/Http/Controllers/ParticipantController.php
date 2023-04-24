<?php

namespace App\Http\Controllers;

use App\Models\participant;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participant = participant::all();

        return view('liste_participant', compact('participant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $regions = Region::all();
        return view('formulaire_participant', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nom' => 'required|max:20',
            'num_cni' => 'required|max:20',
            'age' => 'required|max:20',
            'sexe' => 'required|max:5',
            'id_region' => 'required|max:2',
            'login' => 'required|max:20',
            'pwd' => 'required|max:20',
            'email' => 'required|max:20',
            'tel' => 'required|max:20',
        ]);

        $participant = participant::create($validatedData);

        return redirect('liste_participant')->with('success', 'Participant crée avec succèss');
    }

    /**
     * Display the specified resource.
     */
    public function show(participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            DB::commit();
            return view('/update_participant', compact("participant"));
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = '')
    {
        //
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            $participant->nom = $request->input('nom');
            $participant->age = $request->input('age');
            $participant->num_cni = $request->input('num_cni');
            $participant->age = $request->input('age');
            $participant->sexe = $request->input('sexe');
            $participant->id_region = $request->input('id_region');
            $participant->login = $request->input('login');
            $participant->pwd = $request->input('pwd');
            $participant->email = $request->input('email');
            $participant->tel = $request->input('tel');
            $participant->save();
            DB::commit();
            return redirect('/liste_participant');
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            DB::beginTransaction();
            participant::find($id)->delete();
            DB::commit();
            return view('/liste_participant')->with('success', 'Participant supprimé avec succes');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
