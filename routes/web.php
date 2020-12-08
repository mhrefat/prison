<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JailorController;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\VisitorController;

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
    return view('master');
});

//jailor
Route::get('jailor/form',[JailorController::class,'showForm'])->name('jailor.form');
Route::post('jailor/form',[JailorController::class,'processList'])->name('jailor.form');
Route::get('jailor/list',[JailorController::class,'showList'])->name('jailor.list');

//prisoner
Route::get('prisoner/form',[PrisonerController::class,'showForm'])->name('prisoner.form');
Route::post('prisoner/form',[PrisonerController::class,'processList'])->name('prisoner.form');
Route::get('prisoner/list',[PrisonerController::class,'showList'])->name('prisoner.list');

//prisoner cell
Route::get('cell/form',[CellController::class,'showForm'])->name('cell.form');

//Prisoner visitors route
Route::get('visitor/form',[VisitorController::class,'showForm'])->name('visitor.form');
Route::post('visitor/form',[VisitorController::class,'processList'])->name('visitor.form');
Route::get('visitor/list',[VisitorController::class,'showList'])->name('visitor.list');

//Delete
Route::get('jailor/delete/{id}',[JailorController::class,'deleteJailor'])->name('jailor.delete');
Route::get('Prisoner/delete/{id}',[PrisonerController::class,'deletePrisoner'])->name('delete.prisoner');
Route::get('Visitor/delete/{id}',[VisitorController::class,'deleteVisitor'])->name('delete.visitor');


//EDIT
Route::get('/jailor/edit/{id}',[JailorController::class,'editJailor'])->name('edit.jailor');
Route::post('/jailor/update/{id}',[JailorController::class,'updateJailor'])->name('update.jailor');
Route::get('/prisoner/edit/{id}',[PrisonerController::class,'editPrisoner'])->name('edit.prisoner');
Route::post('/prisoner/update/{id}',[PrisonerController::class,'updatePrisoner'])->name('update.prisoner');
Route::get('/visitor/edit/{id}',[VisitorController::class,'editVisitor'])->name('edit.visitor');
Route::post('/visitor/update/{id}',[VisitorController::class,'updateVisitor'])->name('update.visitor');


//view
Route::get('/jailor/view/{id}',[JailorController::class,'viewJailor'])->name('view.jailor');
Route::get('/prisoner/view/{id}',[PrisonerController::class,'viewPrisoner'])->name('view.prisoner');
Route::get('/visitor/view/{id}',[VisitorController::class,'viewVisitor'])->name('view.visitor');


