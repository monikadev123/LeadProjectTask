<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\LeadController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('post')->controller(PostController::class)->group(function(){
    Route::post('/','create');
    Route::get('/','listing');

});

Route::prefix('lead')->controller(LeadController::class)->group(function(){
   
    Route::post('/{lead_id}','update');
   
});
