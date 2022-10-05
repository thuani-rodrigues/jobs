<?php

use App\Http\Controllers\CompanyController;
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

Route::get("/companies", [CompanyController::class, 'index']);
Route::post("/companies", [CompanyController::class, 'store']);
Route::get("/companies/{company}", [CompanyController::class, 'show']);
