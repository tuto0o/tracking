<?php

class AdminSolicitudesController extends \BaseController {
	
	public function listSolicitudes($idSolicitud=0)
	{
		$sSolicitudes = DB::table('f_solicitudes');
		
		if ($idSolicitud>0){
			$sSolicitudes	= $sSolicitudes->where('sId', '=', $idSolicitud);
		}
		
		$sSolicitudes = $sSolicitudes->where('sEncargado', '=', Session::get('usuId'))->get();
		
		foreach($sSolicitudes as $sSolicitudes)
		{
			$sCreador		= datosUsuario($sSolicitudes->sIdCreador);
			
			$data['data'][]	= [
			'id'									=> $sSolicitudes->sId,
			'idCreador'						=> $sSolicitudes->sIdCreador,
			'nombreCreador'				=> $sCreador['nombre'],
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
		
		return View::make('listaSolicitudes', $data);
	}
}
