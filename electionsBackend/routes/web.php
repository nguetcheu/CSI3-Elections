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

Route::get("/region_index", [RegionController::class, "index"]);
Route::get("regions_create", [RegionController::class, "create"]);
Route::post("/region_store", [RegionController::class, "store"]);
Route::resource('region', 'RegionController');
