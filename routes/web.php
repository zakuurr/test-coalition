<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.partials.dashboard');
});


Route::controller(ProjectController::class)
    ->prefix("/projects")
    ->name("projects.")
    ->group(function (){
        Route::get("/", "index")->name("index");
        Route::get("/create", "create")->name("create");
        Route::get("/edit/{id}", "edit")->name("edit");
        Route::post("/store", "store")->name("store");
        Route::patch("/update/{id}", "update")->name("update");
        Route::delete("/delete/{id}", "destroy")->name("destroy");
    });

Route::controller(TaskController::class)
    ->prefix("/tasks")
    ->name("tasks.")
    ->group(function (){
        Route::get("/", "index")->name("index");
        Route::post('/reorder', 'reorder')->name('reorder');
        Route::get("/create", "create")->name("create");
        Route::get("/edit/{id}", "edit")->name("edit");
        Route::get("/delete/{id}", "delete")->name("delete");
        Route::post("/store", "store")->name("store");
        Route::patch("/update/{id}", "update")->name("update");
        Route::delete("/delete/{id}", "destroy")->name("destroy");
    });
