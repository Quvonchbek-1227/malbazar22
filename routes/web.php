<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\animalsAdminController;


use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\SearchsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ContactsController;


Route::get('/' , [UsersController::class, 'index'])->name('index');

Route::get('signin', [UsersController::class, 'signin'])->name('signin');

Route::post('create', [UsersController::class, 'create']);

Route::get('signup', [UsersController::class, 'signup'])->name('signup');

Route::get('addanimal', [UsersController::class, 'ad'])->name('addanimal');

Route::post('/createanimal', [AnimalsController::class, 'addanimal']);

Route::post('/checklogin', [UsersController::class, 'checklogin']);

Route::get('/category/{id}', [CategoriesController::class, 'category'])->name('category');

Route::get('/animaldetail/{id}', [AnimalsController::class, 'animaldetail'])->name('animaldetail');

Route::get('logout', [UsersController::class, 'logout'])->name('logout');


Route::get('/search', [SearchsController::class, 'search']);

Route::get('searchads', [SearchsController::class, 'searchads'])->name('searchads');



Route::post('addcomment/{id}', [CommentsController::class, 'addcomment'])->name('addcomment');




Route::get('myads', [AnimalsController::class, 'myads'])->name('myads');

Route::get('deleteads/{id}', [AnimalsController::class, 'deleteads'])->name('deleteads');

Route::get('blog/{id}', [NewsController::class, 'getNews'])->name('getNews');


Route::get('addfavourite', [FavouritesController::class, 'addfavourite'])->name('addfavourite');

Route::get('/myfavourites', [FavouritesController::class, 'myfavourites']);

Route::get('deletefavourite/{fav_id}', [FavouritesController::class, 'deletefavourite'])->name('deletefavourite');





Route::get('login', [AdminController::class, 'checklogin'])->name('login');


Route::post('test_login', [AdminController::class, 'test_checklogin'])->name('test');

Route::get('logoutadmin', [AdminController::class, 'logout'])->name('logoutadmin');


Route::get('admin', [AdminController::class, 'admin'])->name('admin');


Route::get('datatable/{table_name}', [AdminController::class, 'getdata'])->name('datatable');


Route::get('createdata', [AdminController::class, 'createdata'])->name('createdata');

Route::post('/checkdata/{table_name}', [AdminController::class, 'checkdata'])->name('checkdata');

Route::get('editdata/{table_name}/{id}', [AdminController::class, 'editdata'])->name('editdata');

Route::post('/checkeditdata/{table_name}', [AdminController::class, 'checkeditdata'])->name('checkeditdata');

Route::get('/contacts', [ContactsController::class, 'getdata'])->name('contacts');

Route::post('createcomment', [ContactsController::class, 'createcomment'])->name('createcomment');

Route::get('deletedata/{table_name}/{id}', [AdminController::class, 'deletedata'])->name('deletedata');