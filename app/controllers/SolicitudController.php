<?php

class SolicitudController extends \BaseController {
	
	public function listaSolicitud($idSolicitud, $idCreador)
	{
		$sSolicitudes = DB::table('f_solicitudes');
		
		if ($idSolicitud>0){
			$sSolicitudes	= $sSolicitudes->where('sId', '=', $idSolicitud);
		}
		if ($idCreador>0){
			$sSolicitudes	= $sSolicitudes->where('sIdCreador', '=', $idCreador);
		}
		
		$sSolicitudes = $sSolicitudes->get();
		
		foreach($sSolicitudes as $sSolicitudes)
		{
			$data[]	= [
			'id'									=> $sSolicitudes->sId,
			'idCreador'						=> $sSolicitudes->sIdCreador,
			'nombreSolicitud'			=> $sSolicitudes->sNombre,
			'modalidadSolicitud'	=> $sSolicitudes->sModalidad,
			'fechaEntrega'				=> $sSolicitudes->sFechaEntrega,
			'descripcionSolicitud'=> $sSolicitudes->sDescripcion,
			'encargadoSolicitud'	=> $sSolicitudes->sEncargado,
			'estadoSolicitud'			=> $sSolicitudes->sEstado,
			'observacionSolicitud'=> $sSolicitudes->sObservacion,
			'idImagenes'					=> $sSolicitudes->sIdImagenes,
			'fechaIngreso'				=> $sSolicitudes->sFechaIngreso,
			'fechaRevision'				=> $sSolicitudes->sFechaRevision,			
			];
		}
		return $data;
	}
	
	public function estadoSolicitudes(){
		
		$sSolicitudes	= $this->listaSolicitud(0, 0);
		
		foreach($sSolicitudes as $sSolicitudes){
			$data['data'][]	= [
				'id'									=> $sSolicitudes['id'],
				'idCreador'						=> $sSolicitudes['idCreador'],
				'nombreSolicitud'			=> $sSolicitudes['nombreSolicitud'],
				'modalidadSolicitud'	=> $sSolicitudes['modalidadSolicitud'],
				'fechaEntrega'				=> $sSolicitudes['fechaEntrega'],
				'descripcionSolicitud'=> $sSolicitudes['descripcionSolicitud'],
				'encargadoSolicitud'	=> $sSolicitudes['encargadoSolicitud'],
				'estadoSolicitud'			=> $sSolicitudes['estadoSolicitud'],
				'observacionSolicitud'=> $sSolicitudes['observacionSolicitud'],
				'idImagenes'					=> $sSolicitudes['idImagenes'],
				'fechaIngreso'				=> $sSolicitudes['fechaIngreso'],
				'fechaRevision'				=> $sSolicitudes['fechaRevision']			
			];
		}

		return View::make('estadoSolicitudes', $data);
	}
	
	public function guardarSolicitud()
	{
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" and $_FILES['txtArchivos']){
			
			$files 								= Input::file('txtArchivos');
			$nombreSolicitud			= Input::get("txtNombreSolicitud");
			$descripcionSolicitud	= Input::get("txtDescripcion");
			$modalidadSolicitud		= Input::get("txtModalidad");
			$fTemp								= explode("-", Input::get("txtFechaEntrega"));
			$fechaSolicitud				= $fTemp[2]."-".$fTemp[1]."-".$fTemp[0];
			
			$idUsuario						= Session::get('usuId');
			
			$html		= "";
			$cont		= 0;
			$idImagenes	= str_replace([':','-',' '], [''], Date('d-m-Y H:i:s')).'_'.$idUsuario;
			
			foreach ($files as $file){

				/*Obtener parametros de archivos a cargar*/	
				$name 				= utf8_decode($file->getClientOriginalName());
				$nuevoNombre	= $idImagenes."_".$cont;
							
				/*Validar extension de archivos*/	
				$ext_validas = array("txt", "rar", "zip");
				$ext_archivo = $file->getClientOriginalExtension(); 
				
				$dirTemporal	= public_path()."/archivosSolicitudes/".$idUsuario;
				
				if (!File::exists($dirTemporal)){
					File::makeDirectory(public_path().'/archivosSolicitudes/'.$idUsuario, 0775);
				}
				
				$destinoTemporal 	= public_path()."/archivosSolicitudes/".$idUsuario."/".$nuevoNombre.".".$ext_archivo;
						
				if (!File::copy($file, $destinoTemporal))
				{
					$html	.= '<p class="help-block danger">Se produjo un error con el archivo: '.$name.'</p>';
				}
				$cont++;
			}

			$dir						= public_path()."/archivosSolicitudes/";
			$nombreArchivos	= File::allFiles($dirTemporal);
			
			$data[]	= [
			'sIdCreador'		=> $idUsuario,
			'sNombre'				=> $nombreSolicitud,
			'sModalidad'		=> $modalidadSolicitud,
			'sFechaEntrega'	=> $fechaSolicitud,
			'sDescripcion'	=> $descripcionSolicitud,
			'sIdImagenes'		=> $idImagenes			
			];
			
			if ($html==""){
				DB::table('f_solicitudes')->insert($data);
				$sQuery	= DB::table('f_solicitudes')->where('sIdCreador', '=', $idUsuario)->where('sIdImagenes', '=', $idImagenes)->take(1)->get(['sId']);
				
				foreach ($sQuery as $sQuery){
					$idSolicitud	= $sQuery->sId;
				}
				
				foreach($nombreArchivos as $data){
					$archivo	= $data->getFilename();
					
					$insert	= [
					'aIdSolicitud'	=> $idSolicitud,
					'aNombre'				=> $archivo,
					'aFechaIngreso'	=> Date('Y-m-d H:i:s')
					];
					DB::table('f_archivossolicitudes')->insert($insert);
				}
			}
			File::cleanDirectory($dirTemporal);
			
			return $html;
		}
	}
	
	public function adminSolicitudes(){
		
		$idSolicitud	= Input::get('d');
		$tipoUsuario	= Session::get('usuTipoUsuario');
		$idUsuario		= 0;
		
		if ($tipoUsuario==0){
			$idUsuario	= Session::get('usuId');
		}
		
		$sSolicitudes	= $this->listaSolicitud($idSolicitud, $idUsuario);
		
		foreach($sSolicitudes as $sSolicitudes){
			$creador		= datosUsuario($sSolicitudes['idCreador']);
			
			if ($sSolicitudes['encargadoSolicitud']!=0){
				$encargado	= datosUsuario($sSolicitudes['encargadoSolicitud']);
			}else{
				$encargado['id']			= 0;
				$encargado['nombre']	= "";
			}
			
			$data	= [
				'id'									=> $sSolicitudes['id'],
				'nombreCreador'				=> $creador['nombre'],
				'nombreSolicitud'			=> $sSolicitudes['nombreSolicitud'],
				'modalidadSolicitud'	=> $sSolicitudes['modalidadSolicitud'],
				'fechaEntrega'				=> $sSolicitudes['fechaEntrega'],
				'descripcionSolicitud'=> $sSolicitudes['descripcionSolicitud'],
				'idEncargado'					=> $encargado['id'],
				'encargadoSolicitud'	=> $encargado['nombre'],
				'estadoSolicitud'			=> $sSolicitudes['estadoSolicitud'],
				'observacionSolicitud'=> $sSolicitudes['observacionSolicitud'],
				'idImagenes'					=> $sSolicitudes['idImagenes'],
				'fechaIngreso'				=> $sSolicitudes['fechaIngreso'],
				'fechaRevision'				=> $sSolicitudes['fechaRevision']			
			];
		}

		switch ($tipoUsuario) {
			case '0':
				return View::make('consultaSolicitudes', $data);
				break;
			case '1':
				return View::make('consultaSolicitudes', $data);
				break;
			case '2':
				return View::make('administrarSolicitudes', $data);
				break;
		}
	}
	
	public function actualizarSolicitud(){
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			
			$sIdSolicitud		= recibirToken(base64_decode(Input::get('txtSolicitud')));
			$sEstado				= Input::get('txtEstado');
			$sEncargado			= Input::get('txtDelegar');
			$sObservacion		=	Input::get('txtObservacion');
			
			$update		= [
			'sEstado'				=> $sEstado,
			'sEncargado'		=> $sEncargado, 
			'sObservacion'	=> $sObservacion,
			'sFechaRevision'=> date('Y-m-d H:i:s')
			];
			
			DB::table('f_solicitudes')->where('sId', $sIdSolicitud)->update($update);
			
		}
	}
}
