<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vote = Vote::all();
        return response()->json($vote, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vote $vote)
    {
        //
    }
}
