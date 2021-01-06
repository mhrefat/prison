<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JailorController;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\PCaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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



//admin login
Route::get('/admin/login',[UserController::class,'login'])->name('admin.login');
Route::post('/admin/login',[UserController::class,'process'])->name('admin.process');

Route::group(['middleware'=>'auth','admin'], function(){

    Route::get('/admin', function () {
        return view('master');
    })->name('master');
   
    Route::get('/dashboard',[DashboardController::class,'show'])->name('dashboard');
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
    Route::post('cell/form',[CellController::class,'processList'])->name('cell.form');
    Route::get('cell/list',[CellController::class,'showList'])->name('cell.list');
    
    //Cell Category 
    Route::get('category/form',[CategoryController::class,'showForm'])->name('category.form');
    Route::post('category/form',[CategoryController::class,'processList'])->name('category.form');
    Route::get('category/list',[CategoryController::class,'showList'])->name('category.list');
    
    //Prisoner visitors route
    Route::get('visitor/form',[VisitorController::class,'showForm'])->name('visitor.form');
    Route::post('visitor/form',[VisitorController::class,'processList'])->name('visitor.form');
    Route::get('visitor/list',[VisitorController::class,'showList'])->name('visitor.list');
    
    //Prisoner Case
    Route::get('case/form',[PCaseController::class,'showForm'])->name('case.form');
    Route::post('case/form',[PCaseController::class,'processList'])->name('case.form');
    Route::get('case/list',[PCaseController::class,'showList'])->name('case.list');
    
    
  
    
    
    
    
    //Delete
    Route::get('jailor/delete/{id}',[JailorController::class,'deleteJailor'])->name('jailor.delete');
    Route::get('Prisoner/delete/{id}',[PrisonerController::class,'deletePrisoner'])->name('delete.prisoner');
    Route::get('Visitor/delete/{id}',[VisitorController::class,'deleteVisitor'])->name('delete.visitor');
    Route::get('Category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    
    
    //EDIT
    Route::get('/jailor/edit/{id}',[JailorController::class,'editJailor'])->name('edit.jailor');
    Route::post('/jailor/update/{id}',[JailorController::class,'updateJailor'])->name('update.jailor');
    
    Route::get('/prisoner/edit/{id}',[PrisonerController::class,'editPrisoner'])->name('edit.prisoner');
    Route::post('/prisoner/update/{id}',[PrisonerController::class,'updatePrisoner'])->name('update.prisoner');
    
    Route::get('/visitor/edit/{id}',[VisitorController::class,'editVisitor'])->name('edit.visitor');
    Route::post('/visitor/update/{id}',[VisitorController::class,'updateVisitor'])->name('update.visitor');
    
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/category/update/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    
    Route::get('/case/edit/{id}',[PCaseController::class,'editCase'])->name('edit.case');
    
    
    
    //view
    Route::get('/jailor/view/{id}',[JailorController::class,'viewJailor'])->name('view.jailor');
    Route::get('/prisoner/view/{id}',[PrisonerController::class,'viewPrisoner'])->name('view.prisoner');
    Route::get('/visitor/view/{id}',[VisitorController::class,'viewVisitor'])->name('view.visitor');
    Route::get('/user/view/{id}',[UserController::class,'viewUser'])->name('view.user');

});
  // Login page 
  Route::get('/',[UserController::class,'showForm'])->name('login.form');
  Route::post('/login',[UserController::class,'processLogin'])->name('login.process');
  Route::get('logout',[UserController::class,'logout'])->name('user.logout');
  Route::get('/registration',[UserController::class,'registrationForm'])->name('registration.form');
  Route::post('/registration',[UserController::class,'processRegistration'])->name('registration.form');

  //Frontend task
  Route::group(['namespace'=>'Frontend'],function(){
       
  });





