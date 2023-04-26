<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

/*
    Gestion des routes pour la gestion des regions
*/
Route::get("/region_index", [RegionController::class, "index"]);
Route::get("regions_create", [RegionController::class, "create"]);

Route::post("/region_store", [RegionController::class, "store"]);
// route pour la modification de id d'une region
Route::put('/region/{id}', [RegionController::class, "update"]);

Route::get("/region_delete/{id}", [RegionController::class, "destroy"]);
Route::get("/form_update_region/{id}", [RegionController::class, "edit"]);
//Route::resource('region', 'RegionController');

/*
    Gestion des routes pour la gestion des participants
*/

Route::get("/liste_participant", [ParticipantController::class, "index"]);
Route::get("participant_create", [ParticipantController::class, "create"]);

Route::post("/participant_store", [ParticipantController::class, "store"]);
// route pour la modification de id d'une region
Route::put('/participant/{id}', [ParticipantController::class, "update"]);

Route::get("/participant_delete/{id}", [ParticipantController::class, "destroy"]);
Route::get("/form_update_participant/{id}", [ParticipantController::class, "edit"]);

//Route::resource('participant', 'ParticipantController');
