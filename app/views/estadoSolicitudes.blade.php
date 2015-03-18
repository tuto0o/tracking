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
    <!-- PAGE CONTENT BEGINS --> <!-- /.row -->

    <div class="row">
      <div class="col-xs-12">
        <div class="table-header">
          Historial Solicitudes
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Nombre Solicitud</th>
                <th>Modalidad Compra</th>
                <th class="hidden-480">Fecha Entrega</th>
                <th class="hidden-480">Estado</th>
              </tr>
            </thead>

            <tbody>
              @foreach($data as $key => $value)
              <tr>
                <td>{{ $value['id'] }}</td>
                <td>
                  <a href="{{ URL::to('adminSolicitudes?d=') }}{{ $value['id'] }}">{{ $value['nombreSolicitud'] }}</a>
                </td>
                <td>
                <?php
                $arrModalidad[1]	= 'Gran Compra';
								$arrModalidad[2]	= 'Convenio Marco';
								$arrModalidad[3]	= 'Licitación';
								$arrModalidad[4]	= 'Trato Directo';
								
								echo $arrModalidad[$value['modalidadSolicitud']];
								?>
                </td>
                <td class="hidden-480">
								{{ date('d-m-Y', strtotime($value['fechaEntrega'])) }}
								</td>
                <td class="hidden-480">
                <?php
								switch ($value['estadoSolicitud']) {
									case '0':
										echo '<span class="label label-sm label-warning">Pendiente</span>';	
										break;
									case '1':
										echo '<span class="label label-sm label-success">Aceptada</span>';
										break;
									case '2':
										echo '<span class="label label-sm label-info">Devuelta</span>';
										break;
									case '3':
										echo '<span class="label label-sm label-danger">Rechazada</span>';
										break;
								}
								?>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->
@stop
            
					
@section('specific-scripts')
<!-- page specific plugin scripts -->
{{ HTML::script('/assets/js/dataTables/jquery.dataTables.js') }}
{{ HTML::script('/assets/js/dataTables/jquery.dataTables.bootstrap.js') }}
{{ HTML::script('/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js') }}
{{ HTML::script('/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js') }}

<!-- inline scripts related to this page -->
<script type="text/javascript">
  jQuery(function($) {
    //initiate dataTables plugin
    var oTable1 = 
    $('#dynamic-table')
    .dataTable();
  })
</script>
@stop