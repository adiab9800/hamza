<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\WeekPlanController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('week-plan/import', [\App\Http\Controllers\PartController::class, 'importWeek']);
Route::resource('plans',PlanController::class);
Route::resource('week-plans', WeekPlanController::class);
