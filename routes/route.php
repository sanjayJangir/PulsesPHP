<?php

namespace App\routes;

use App\Controllers\Admin\DashboardController;
use App\Controllers\LoginController;
use App\Servcies\Route;


Route::get('/', LoginController::class, 'index'); // 'LoginController@index'
Route::post('/login', LoginController::class, 'authenticate'); // 'LoginController@authenticate'
Route::get('/dashboard', DashboardController::class, 'index');
