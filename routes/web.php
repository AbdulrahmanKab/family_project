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
Auth::routes(['register'=>false]);
Route::group(['prefix'=>'/admin','middleware'=>'auth:web'],function (){
    Route::group(['middleware'=>'permission:view_person'],function (){
        Route::get('/','admin\indexController@index');
        Route::post('/save/person','admin\indexController@create');
        Route::post('/person/{id}','admin\indexController@show');
        Route::post('/person/{id}/update','admin\indexController@update');
        Route::post("/add/son",'admin\indexController@addSon');
        Route::post("/person/{id}/delete",'admin\indexController@delete');
    });

    Route::group(['middleware'=>'permission:super_admin'],function (){
    Route::get("/permissions",'admin\permssionController@index');
        Route::get('/permission',['uses'=>'admin\permssionController@index']);
        Route::get('/permission/{id}',['uses'=>'admin\permssionController@getPermission']);
        Route::post('/permission/set',['uses'=>'admin\permssionController@setPermission']);
    });
    Route::get("/profile","admin\profileController@index");
    Route::post('/profile/update',"admin\profileController@update");
    Route::get('/messages','messageController@index');
    Route::post("/message/{id}/delete",'messageController@delete');
});

Route::get('/','indexController@index');
Route::get('/tree','indexController@tree');
Route::get('/show/tree','indexController@trees');
Route::post('/send/contactmessage','indexController@sendContact');

