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
    
    <li class="">
      <a href="{{ URL::to('estadoSolicitudes') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Estado Solicitudes
      </a>

      <b class="arrow"></b>
    </li>

    <li class="active">
      <a href="{{ URL::to('ingresoSolicitud') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Ingresar Solicitud
      </a>

      <b class="arrow"></b>
    </li>
    
    <li class="">
      <a href="{{ URL::to('administrarSolicitudes') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Administrar Solicitudes
      </a>

      <b class="arrow"></b>
    </li>
  </ul>
</li>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <form class="form-horizontal" role="form" method="POST" name="frmIngresar" id="frmIngresar" action="{{ URL::to('guardarSolicitud')}}">
      <!-- #section:elements.form -->
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre Solicitud </label>

        <div class="col-xs-4">
          <input type="text" id="txtNombreSolicitud" name="txtNombreSolicitud" placeholder="Ingrese nombre" class="col-xs-12" />
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Modalidad Compra </label>

        <div class="col-xs-4">
          <select id="txtModalidad" name="txtModalidad" class="form-control">
          	<option value="0">Seleccione...</option>
            <option value="1">Gran Compra</option>
            <option value="2">Convenio Marco</option>
            <option value="3">Licitación</option>
            <option value="4">Trato Directo</option>
          </select>
        </div>
      </div>
      
      <div class="form-group">
          <!-- #section:custom/file-input -->
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Adjuntar archivos </label>
          <div class="col-sm-4">
            <input type="file" multiple name="txtArchivos[]" id="txtArchivos" class="col-xs-4 col-sm-4"/>
          </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fecha de entrega esperada </label>

        <div class="col-sm-4">
          <input class="form-control date-picker" name="txtFechaEntrega" id="txtFechaEntrega" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-aaaa" />
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción Solicitud </label>

        <div class="col-sm-4">
          <textarea class="form-control col-xs-4 col-sm-5" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese Descripción"></textarea>
        </div>
      </div>
      
      <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
          <button type="button" id="btnIngresoSolicitud" class="btn btn-info">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Guardar
          </button>
        </div>
      </div>
         
    </form>
  </div>
</div>
@stop

@section('specific-scripts')
{{ HTML::script('/assets/js/date-time/bootstrap-datepicker.js') }}
{{ HTML::script('/assets/js/funcionesSolicitud.js') }}
{{ HTML::script('/assets/js/jquery.form.js') }}

<script type="text/javascript">
  $('#txtArchivos').ace_file_input({
		no_file:'Seleccionar archivos...',
		btn_choose:'Examinar',
		btn_change:'Change',
		droppable:true,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
			
  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
  })
</script>
@stop
