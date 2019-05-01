<?php
//Auth-Login-registro-etc
Auth::routes();

//FrontEnd
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/subir', 'FilesController@create')->name('file.create');
Route::get('archivos/imagenes', 'FilesController@images')->name('file.images');
Route::get('archivos/videos', 'FilesController@videos')->name('file.videos');
Route::get('archivos/audios', 'FilesController@audios')->name('file.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('file.documents');

Route::post('archivos/subir', 'FilesController@store')->name('file.store');

//Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('file.destroy');

//Roles
Route::get('roles', 'Admin\RolesController@index')->name('role.index');
Route::get('roles/agregar', 'Admin\RolesController@create')->name('role.create');
Route::patch('roles/agregar', 'Admin\RolesController@store')->name('role.store');
Route::get('roles/{id}/editar', 'Admin\RolesController@edit')->name('role.edit');
Route::patch('roles/{id}/editar', 'Admin\RolesController@update')->name('role.update');
Route::patch('roles/{id}/eliminar', 'Admin\RolesController@destroy')->name('role.destroy');
Route::get('roles/{id}/detalles', 'Admin\RolesController@show')->name('role.show');

//Permissions
Route::get('permisos', 'Admin\PermissionsController@index')->name('permission.index');
Route::get('permisos/agregar', 'Admin\PermissionsController@create')->name('permission.create');
Route::patch('permisos/agregar', 'Admin\PermissionsController@store')->name('permission.store');
Route::get('permisos/{id}/editar', 'Admin\PermissionsController@edit')->name('permission.edit');
Route::patch('permisos/{id}/editar', 'Admin\PermissionsController@update')->name('permission.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permission.destroy');
//Route::get('permisos/{id}/detalles', 'Admin\PermissionsController@show')->name('permission.show');


