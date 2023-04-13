<?php

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
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/{id}', [KelasController::class, 'show']);
Route::post('/kelas', [KelasController::class, 'store']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/{id}', [SiswaController::class, 'show']);
Route::put('/siswa/{id}', [SiswaController::class, 'update']);
Route::post('/siswa/{id}/nilai', [SiswaController::class, 'storeNilai']);
Route::get('/siswa/{id}/nilai', [SiswaController::class, 'showNilai']);
Route::post('/kelas', [KelasController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
