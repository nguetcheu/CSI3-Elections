<?php

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
Route::resource('region', 'RegionController');
/*
    Gestion des routes pour la gestion des participants
*/
