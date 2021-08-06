<?php

use App\Http\Controllers\Api\DatasController;
use App\Http\Controllers\Api\PendidikansController;
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

Route::get('', [DataController::class, 'index']); 
Route::get('', [PendidikanController::class, 'index']); 
Route::resources([
    'data' => DatasController::class,
    'pendidikan' =>PendidikansController::class,
]);