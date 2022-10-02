<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapTrackinController;
use App\Events\BusMoved;
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
//Route::get('/', [FrontEndController::class,'index'])->name('/');
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[MapTrackinController::class,'index'])->name('/bus-1');
Route::get('/bus-2',[MapTrackinController::class,'bus2'])->name('/bus-2');
Route::post('/bus-moving',[MapTrackinController::class,'BusMoved'])->name('/bus-moving');
Route::get('/moving',[MapTrackinController::class,'moving'])->name('/moving');
//Route::get('/moving',[BusMoved::class,'BusMoved'])->name('/moving');

Route::get('/move', function () {
event(new BusMoved(-79.4512,42.6598));
});
