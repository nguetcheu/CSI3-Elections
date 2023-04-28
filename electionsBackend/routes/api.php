<?php

use App\Http\Controllers\REST\BulletinController;
use App\Http\Controllers\REST\ElectionController;
use App\Http\Controllers\REST\participantController;
use App\Http\Controllers\REST\RegionController;
use App\Http\Controllers\REST\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// gestion region
Route::apiResource("region", RegionController::class);

// désactivation d'un participant
Route::get('onoff/{id}', [ParticipantController::class, "onoff"]);

Route::apiResource("participant", participantController::class);

Route::apiResource("election", ElectionController::class);

Route::apiResource("vote", VoteController::class);

Route::apiResource("bulletin", BulletinController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
