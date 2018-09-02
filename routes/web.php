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


Auth::routes();

Route::group([], function($router) {
    $router->get('/', function () {
        return view('welcome');
    });

    $router->get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'races', 'namespace' => 'Web'], function($router) {
        $router->get('', ['as' => 'races', 'uses' => 'RaceController@index']);
        $router->get('show/{raceId}', ['as' => 'races.show', 'uses' => 'RaceController@show']);
        $router->get('{raceId}/category-users/{categoryId}', ['as' => 'races.category', 'uses' => 'RaceController@getCategoryUsers']);
        $router->get('user/{userId}', ['as' => 'races.user', 'uses' => 'RaceController@getRaceUser']);
    });
});
