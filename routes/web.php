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

Route::get('/', function () {
    return view('layout');
});

Route::get('/login', function () {
    return view('login');
})->name('login');



//auth
Route::any('checkin', 'LoginController@authenticate');

Route::get('logout', 'UserController@logout');

Route::put('/usuarios/password/{id}','UserController@password')->where('id', '[0-9]+');

Route::put('/usuarios/update/{id}','UserController@update')->where('id', '[0-9]+');

//usuarios
Route::group(['middleware' => 'admin'], function () {
Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/create', 'UserController@create');


Route::get('/usuarios/{id}','UserController@show')->where('id', '[0-9]+')->name('users.show');

Route::post('/usuarios/store', 'UserController@store');

Route::get('/perfil', 'UserController@perfil');

//empresas
Route::get('/empresas', 'CompanyController@index');

Route::put('/empresas/update/{id}','CompanyController@edit');

Route::get('/empresas/{id}','CompanyController@show')->where('id', '[0-9]+')->name('company.show');

Route::get('/empresas/create', 'CompanyController@create');

Route::post('/empresas', 'CompanyController@store');

Route::put('/empresas/updatedoc/{id}','CompanyController@updateDocument');

Route::put('/empresas/updatecer/{id}','CompanyController@updateCert');

//trabajadores
Route::get('/trabajadores/create/{id}', 'WorkerController@create')->where('id', '[0-9]+')->name('workers.create');;

Route::get('/trabajadores/{id}', 'WorkerController@list')->where('id', '[0-9]+')->name('workers.list');

Route::get('/trabajadores/show/{id}', 'WorkerController@show')->where('id', '[0-9]+')->name('workers.details');

Route::post('/trabajadores', 'WorkerController@store');

Route::put('/trabajadores/update/{id}','WorkerController@edit');

Route::put('/trabajadores/docs','WorkerController@editdoc');

Route::put('/trabajadores/delete','WorkerController@delete');

Route::put('/trabajadores/delworker','WorkerController@delwork');

//Docs
Route::post('/documentos', 'DocumentController@store');

//Equipamento
Route::get('/equipamento/create/{id}', 'EquipmentController@create')->where('id', '[0-9]+')->name('equipment.create');;

Route::get('/equipamento/{id}', 'EquipmentController@list')->where('id', '[0-9]+')->name('equipment.list');

Route::get('/equipamento/show/{id}', 'EquipmentController@show')->where('id', '[0-9]+')->name('equipment.details');

Route::post('/equipamento', 'EquipmentController@store');

Route::put('/equipamento/update/{id}','EquipmentController@edit');

Route::put('/equipamento/docs','EquipmentController@editdoc');

Route::put('/equipamento/delete','EquipmentController@delete');

Route::put('/equipamento/delequip','EquipmentController@delequip');

//Docs
Route::post('/documentosEquip', 'DocumentController@storeEquip');

//Instalaciones
Route::get('/instalaciones/create/{id}', 'PlantController@create')->where('id', '[0-9]+')->name('plant.create');;

Route::get('/instalaciones/{id}', 'PlantController@list')->where('id', '[0-9]+')->name('plant.list');

Route::get('/instalaciones/show/{id}', 'PlantController@show')->where('id', '[0-9]+')->name('plant.details');

Route::post('/instalaciones', 'PlantController@store');

Route::put('/instalaciones/update/{id}','PlantController@edit');

Route::put('/instalaciones/docs','PlantController@editdoc');

Route::put('/instalaciones/delete','PlantController@delete');

Route::put('/instalaciones/delplan','PlantController@delplan');

//Docs
Route::post('/documentPlant', 'DocumentController@storePlant');

//Plan Preventivo
Route::get('/preventivo/create/{id}', 'PreventiveController@create')->where('id', '[0-9]+')->name('preventive.create');;

Route::get('/preventivo/{id}', 'PreventiveController@list')->where('id', '[0-9]+')->name('preventive.list');

Route::get('/preventivo/show/{id}', 'PreventiveController@show')->where('id', '[0-9]+')->name('preventive.details');

Route::post('/preventivo', 'PreventiveController@store');

Route::put('/preventivo/update/{id}','PreventiveController@edit');

Route::put('/preventivo/docs','PreventiveController@editdoc');

Route::put('/preventivo/delete','PreventiveController@delete');

Route::put('/preventivo/delplan','PreventiveController@delplan');

//Docs
Route::post('/documentosPlant', 'DocumentController@storePrev');

//Especifica

Route::get('/especifica/{id}', 'SpecificController@list')->where('id', '[0-9]+')->name('company.specific');

Route::put('/especifica/', 'SpecificController@store')->name('preventive.list');

Route::put('/especifica/delete','SpecificController@delete');

});

//dashboard cliente

Route::get('/dashboard', 'UserController@dashboard');

Route::get('/miplan', 'PreventiveController@dashboard');

Route::get('/miequip', 'EquipmentController@dashboard');

Route::get('/miworker', 'WorkerController@dashboard');

Route::get('/milocal', 'PlantController@dashboard');

Route::get('/midoc', 'SpecificController@dashboard');

Route::get('/perfil', 'UserController@perfil');