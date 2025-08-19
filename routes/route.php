<?php

namespace App\routes;

use App\Servcies\Route;

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@authenticate');
Route::get('/dashboard', 'DashboardController@index');
