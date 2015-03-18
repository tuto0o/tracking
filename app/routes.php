<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	Session::put('keyCode', getRandomCode());
	return View::make('index');
});

Route::get('login', function()
{
	return Redirect::to('/');
});

Route::post('login', ['uses' => 'LoginController@validarUsuario']);

Route::group(['before'=>'auth'], function(){	
	Route::get('inicio', ['uses'=>'SolicitudController@estadoSolicitudes']);
	
	//RUTAS GUARDAR DATOS
	//Guardar solicitud
	Route::post('guardarSolicitud', ['uses'=>'SolicitudController@guardarSolicitud']);
	
	//Actualizar solicitud
	Route::post('actualizarSolicitud', ['uses'=>'SolicitudController@actualizarSolicitud']);
	
	//RUTAS VISTAS
	//lista de solicitudes y sus estados
	Route::get('estadoSolicitudes', ['uses'=>'SolicitudController@estadoSolicitudes']);
	
	//Vista para crear solicitudes
	Route::get('ingresoSolicitud', function(){
		return View::make('ingresarSolicitud');	
	});
	
	//vista para administrar las solicitudes o consultar sus datos
	Route::get('adminSolicitudes', ['uses'=>'SolicitudController@adminSolicitudes']);
	
	//vista para administrar las solicitudes o consultar sus datos
	Route::get('administrarSolicitudes', ['uses'=>'AdminSolicitudesController@listSolicitudes']);
	
	
	Route::get('granCompraLicitacion', function(){
		return View::make('granCompraLicitacion');	
	});
});
?>