<?php
use App\Http\Controllers\NotebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('notebook/',[NotebookController::class,'show']);
Route::post('notebook/',[NotebookController::class,'post']);
Route::get('notebook/{id}',[NotebookController::class,'showId']);
Route::post('notebook/{id}',[NotebookController::class,'postId']);
Route::delete('notebook/{id}',[NotebookController::class,'delete']);