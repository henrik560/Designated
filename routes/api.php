<?php

use App\Http\Controllers\ConsultationRequestController;
use App\Http\Controllers\PagesContentController;
use App\Http\Controllers\SiteSettingsController;
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

Route::get('/pages/{page}', [PagesContentController::class, 'show']);
Route::get('/global/{handle}', [SiteSettingsController::class, 'show']);

Route::post('/form/consultation-request', [ConsultationRequestController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
