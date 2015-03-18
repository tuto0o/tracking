<?php

class LoginController extends \BaseController {

	public function validarUsuario()
	{
		$data = Input::all();	
		$rules= [
			'txtUsuario'=>	'required',
			'txtClave'	=>	'required'	
		];
		$validator 	= Validator::make($data, $rules);
		
		if($validator->passes()){
			
			$sMail	= Input::get('txtUsuario');
			$sClave	= utf8_decode(Input::get('txtClave'));
		
			$sDatosUsuario = DB::table('f_usuarios')->where('usu_mail', '=', $sMail)->pluck('usu_id');
			
			if(count($sDatosUsuario) == 0){
				return Redirect::to('/')->withInput()->withErrors(['mensaje'=>'Datos incorrectos']);
			}else{
				
				// Datos Login para Validar		
				$user = [
					'usu_mail'	=>	$sMail, 
					'usu_pass'	=>	$sClave
				];
				
				if(Auth::attempt($user)){

					Session::put('usuId', Auth::user()->usu_id);
					Session::put('usuNombre', Auth::user()->usu_nombre);
					Session::put('usuMail', Auth::user()->usu_mail);
					Session::put('usuTipoUsuario', Auth::user()->usu_tipo_usuario);
					Session::put('usuEstado', Auth::user()->usu_estado);
					
					
					
					if (Auth::user()->usu_estado!=1){
						return Redirect::to('/')->withInput()->withErrors(['mensaje'=>'Datos incorrectos']);
					}else{
						return Redirect::to('inicio');
					}
					
				}else{
					return Redirect::to('/')->withInput()->withErrors(['mensaje'=>'Datos incorrectos']);
				}
			}
		}else{
			return Redirect::to('/')->withInput()->withErrors(['mensaje'=>'Datos incorrectos']);
		}
	}
}

?>