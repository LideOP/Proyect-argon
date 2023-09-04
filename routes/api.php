<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
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
Route::get('/estudiantes',[EstudianteController::class,'estudiantes5to']);

Route::get('/cursos_estu',[EstudianteController::class,'cursos_estudiantes']);
Route::get('/top5',[EstudianteController::class, 'ejercicioTop5']);
Route::get('/ordenarDesc',[EstudianteController::class, 'ordenarCi']);
Route::post('/registrarEstudiante/{nombre}/{grado}',[EstudianteController::class,'registrar']);
Route::get('/suma',[EstudianteController::class, 'sumaPrueba']);

Route::get('/promedio',[EstudianteController::class, 'promedioPrueba']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
