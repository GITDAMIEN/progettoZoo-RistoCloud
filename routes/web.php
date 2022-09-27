<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZooController;
use App\Http\Controllers\PublicController;

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


// PUBLIC CONTROLLER
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/aboutUs', [PublicController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contactUs', [PublicController::class, 'contactUs'])->name('contactUs');
Route::get('/allAnimals', [PublicController::class, 'allAnimals'])->name('allAnimals');
Route::get('/allCategories', [PublicController::class, 'allCategories'])->name('allCategories');
Route::get('/animalDetails/{animal}', [PublicController::class, 'animalDetails'])->name('animalDetails');
Route::post('/contactForm', [PublicController::class, 'contactForm'])->name('contactForm');

// ZOO CONTROLLER
Route::get('/enlargeZoo', [ZooController::class, 'enlargeZoo'])->middleware('auth')->name('enlargeZoo');
Route::post('/addAnimal', [ZooController::class, 'addAnimal'])->middleware('auth')->name('addAnimal');
Route::post('/addCategory', [ZooController::class, 'addCategory'])->middleware('auth')->name('addCategory');
Route::get('/editAnimal/{animal}', [ZooController::class, 'editAnimal'])->middleware('auth')->name('editAnimal');
Route::put('/confirmAnimalEdit/{animal}', [ZooController::class, 'confirmAnimalEdit'])->middleware('auth')->name('confirmAnimalEdit');
Route::delete('/deleteAnimal/{animal}', [ZooController::class, 'deleteAnimal'])->middleware('auth')->name('deleteAnimal');