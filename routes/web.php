<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',array('uses'=>'Controller@homePage'));

Route::get('/admin/login',array('uses'=>'Controller@adminLogin'));

Route::get('/admin/form',array('uses'=>'Controller@adminJobInsertion'));

Route::post('/admin/save',array('uses'=>'Controller@adminJobSave'));

Route::get('/job_{id}',array('uses'=>'Controller@description'));

Route::get('/degree',array('uses'=>'Controller@department'));

Route::post('/register',array('uses'=>'Controller@registration'));

Route::post('/login',array('uses'=>'Controller@login'));

Route::get('/{cat}',array('uses'=>'Controller@category'));
