<?php

namespace App\Http\Controllers;

use App\Models\participant;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participants = participant::all();

        return view('liste_participant', compact('participants'));
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
            'statut' => 'required|max:2',
            'id_region' => 'required|max:2',
            'login' => 'required|max:20',
            'pwd' => 'required|max:20',
            'email' => 'required|max:20',
            'etat' => 'required|max:2',
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
    public function edit(participant $participant)
    {
        //
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            DB::commit();
            return view('/update_participant', compact("particpants"));
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, participant $participant)
    {
        //
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            $participant->label = $request->input('label');
            $participant->save();
            DB::commit();
            return redirect('/lister_participant');
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(participant $participant)
    {
        //
        try {
            DB::beginTransaction();
            $participant = participant::find($id);
            DB::commit();
            return view('/lister_participant')->with('success', 'Participant supprimé avec succes');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
