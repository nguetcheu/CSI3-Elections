<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $region = Region::all();

        return view('index', compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("formulaire_region");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'label' => 'required|max:20'
        ]);

        $region = Region::create($validatedData);

        return redirect('region_index')->with('success', 'Région crée avec succèss');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            DB::beginTransaction();
            $region = Region::find($id);
            DB::commit();
            return view('/update_region', compact("region"));
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
            $region = Region::find($id);
            $region->label = $request->input('label');
            $region->save();
            DB::commit();
            return redirect('/region_index');
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            Region::find($id)->delete();
            DB::commit();
            return view('/region_index')->with('success', 'Region supprimé avec succes');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
