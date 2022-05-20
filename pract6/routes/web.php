<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/professor', function () {
    return ProfessorsController::get();
});
Route::put('/professor', [ProfessorsController::class, "put"]);
Route::post('/professor', [ProfessorsController::class, "post"]);
Route::delete('/professor', [ProfessorsController::class, "delete"]);
Route::get("/professor_put_view/{id}", [ProfessorsController::class, "put_view"]);
Route::get("/professor_post_view", [ProfessorsController::class, "post_view"]);
