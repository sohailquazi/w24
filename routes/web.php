<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['role:super admin']], function () {

Route::get('/home', 'HomeController@index')->name('home');

// Group
Route::get('/groups','Group@index')->name('groups');
Route::get('/add-group','Group@create')->name('add_grup');
Route::post('/store-group','Group@store')->name('store_grup');
Route::get('/edit-group/{id}','Group@edit')->name('edit_grup');
Route::post('/update-group/{id}','Group@update')->name('update_grup');
Route::get('/destroy-group/{id}','Group@destroy')->name('destroy_grup');

// UserController
Route::get('create-roles','UserController@createRoles');

Route::get('managers','UserController@index')->name('managers');
Route::get('add-manager','UserController@create')->name('add_manager');
Route::post('store-manager','UserController@store')->name('store_manager');
Route::get('edit/{id}','UserController@edit')->name('edit_manager');
Route::post('update-manager/{id}','UserController@update')->name('update_manager');
Route::get('destroy-manager/{id}','UserController@destroy')->name('destroy_manager');
Route::get('show-manager/{id}','UserController@show')->name('show_manager');

// AgentController
Route::get('agents','AgentController@index')->name('index_agents');
Route::get('create-agents','AgentController@create')->name('create_agents');
Route::post('store-agents','AgentController@store')->name('store_agents');
Route::get('edit-agents/{id}','AgentController@edit')->name('edit_agents');
Route::post('update-agents/{id}','AgentController@update')->name('update_agents');
Route::get('destroy-agents/{id}','AgentController@destroy')->name('destroy_agents');
Route::get('show-agents/{id}','AgentController@show')->name('show_agents');
Route::post('getGroupAgent','AgentController@getGroupAgent')->name('getGroupAgent');

});

// Frontend - AgentController
Route::group(['middleware' => ['role:agent']], function () {
	Route::get('agent-dashboard','Frontend\AgentController@agentDashboard')->name('agent_dashboard');
});