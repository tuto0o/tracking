@extends('layouts.layoutMaster')
      
<!-- page specific plugin styles -->
@section('specific-styles')
{{ HTML::style('/assets/css/jquery-ui.custom.css') }}
{{ HTML::style('/assets/css/chosen.css') }}
{{ HTML::style('/assets/css/datepicker.css') }}
@stop
						
@section('notifications')
<li class="purple">
  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
    <span class="badge badge-important">4</span>
  </a>

  <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
    <li class="dropdown-header">
      <i class="ace-icon fa fa-exclamation-triangle"></i>
      4 Notificaciones
    </li>

    <li class="dropdown-content">
      <ul class="dropdown-menu dropdown-navbar navbar-pink">
        <li>
          <a href="#">
            <div class="clearfix">
              <span class="pull-left">
                <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                Solicitudes Vencidas
              </span>
              <span class="pull-right badge badge-info">+4</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="clearfix">
              <span class="pull-left">
                <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                Nuevas Solicitudes
              </span>
              <span class="pull-right badge badge-success">+3</span>
            </div>
          </a>
        </li>
      </ul>
    </li>

    <li class="dropdown-footer">
      <a href="#">
        Ver Todas
        <i class="ace-icon fa fa-arrow-right"></i>
      </a>
    </li>
  </ul>
</li>
@stop

@section('buttons-user')
<button class="btn btn-success">
  <i class="ace-icon fa fa-signal"></i>
</button>

<button class="btn btn-info">
  <i class="ace-icon fa fa-pencil"></i>
</button>

<!-- #section:basics/sidebar.layout.shortcuts -->
<button class="btn btn-warning">
  <i class="ace-icon fa fa-users"></i>
</button>

<button class="btn btn-danger">
  <i class="ace-icon fa fa-cogs"></i>
</button>
@stop

@section('menu')
<li class="">
  <a href="{{ URL::to('estadoSolicitudes') }}">
    <i class="menu-icon fa fa-tachometer"></i>
    <span class="menu-text"> Inicio </span>
  </a>

  <b class="arrow"></b>
</li>

<li class="active open">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-desktop"></i>
    <span class="menu-text">
      Solicitudes
    </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">
    
    <li class="active">
      <a href="{{ URL::to('estadoSolicitudes') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Estado Solicitudes
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="{{ URL::to('ingresoSolicitud') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Ingresar Solicitud
      </a>

      <b class="arrow"></b>
    </li>
    
    <li class="">
      <a href="{{ URL::to('compraSolicitudes') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Administrar Solicitudes
      </a>

      <b class="arrow"></b>
    </li>
  </ul>
</li>
@stop

@section('content')
<!-- /section:settings.box --><!-- /.page-header -->
<form class="form-horizontal" role="form" method="POST" name="frmGuardar" id="frmGuardar" action="{{ URL::to('actualizarSolicitud')}}">

  <dl class="dl-horizontal">
    <dt>Nombre Solicitud: </dt>
    <dd>{{ $nombreSolicitud }}</dd>
  </dl>
  
  <dl class="dl-horizontal">
    <dt>Descargar Archivos: </dt>
    <dd><a href="{{ URL::to('descargarArchivos?d=') }}{{ $id }}"><i class="fa fa-cloud-download fa-3x"></i></a></dd>
  </dl>
  
  <dl class="dl-horizontal">
    <dt>Fecha Esperada: </dt>
    <dd>{{ date('d-m-Y', strtotime($fechaEntrega)) }}</dd>
  </dl>
    
  <dl class="dl-horizontal">
    <dt>Descripción Solicitud: </dt>
    <dd>{{ $descripcionSolicitud }}</dd>
  </dl>
    
  <dl class="dl-horizontal">
    <dt>Estado: </dt>
    <dd>
    <div class="row">
    <div class="col-xs-2">
    <select id="txtEstado" name="txtEstado" class="form-control">
      <option value="0">Pendiente</option>
      <option value="1">Aceptar</option>
      <option value="2">Devolución</option>
      <option value="3">Rechazar</option>
    </select>
    </div>
    </div>
    </dd>
  </dl>
    
  <dl class="dl-horizontal">
    <dt>Delegar a: </dt>
    <dd>
    <div class="row">
    <div class="col-xs-2">
    <select id="txtDelegar" name="txtDelegar" class="form-control">
      <option value="0">Seleccione...</option>
      <option value="1">Julian Barrera</option>
      <option value="2">Roberto Muñoz</option>
      <option value="3">Victor Romero</option>
    </select>
    </div>
    </div>
    </dd>
  </dl>
    
  <dl class="dl-horizontal">
    <dt>Observación: </dt>
    <dd>
    <div class="row">
    <div class="col-xs-6">
    <textarea class="form-control col-xs-10 col-sm-5" id="txtObservacion" name="txtObservacion" placeholder="Ingrese Observación">{{ $observacionSolicitud }}</textarea>
    </div>
    </div>
    </dd>
  </dl>
    
  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button type="button" class="btn btn-info" id="btnGuardarDatos">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Guardar
      </button>
      <input type="hidden" id="txtSolicitud" name="txtSolicitud" value="{{ base64_encode(crearToken($id)) }}">
    </div>
  </div>

</form>
@stop

    
@section('specific-scripts')
{{ HTML::script('/assets/js/date-time/bootstrap-datepicker.js') }}
{{ HTML::script('/assets/js/funcionesSolicitud.js') }}
{{ HTML::script('/assets/js/jquery.form.js') }}
<script type="text/javascript">
	$("#txtEstado option[value={{ $estadoSolicitud }}]").attr("selected",true);
	$("#txtDelegar option[value={{ $idEncargado }}]").attr("selected",true);
</script>
@stop
