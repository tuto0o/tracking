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

    <li class="">
      <a href="{{ URL::to('ingresoSolicitud') }}">
        <i class="menu-icon fa fa-caret-right"></i>
        Ingresar Solicitud
      </a>

      <b class="arrow"></b>
    </li>
    
    <li class="active">
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
<div class="row">
  <div class="col-sm-12">
    <!-- #section:elements.accordion -->
    
    <h2>Comprar mesas nuevas</h2>
    <p class="lead">Nº 000001</p>
    <div id="accordion" class="accordion-style1 panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
              &nbsp;Etapa I: Elaboración TDR &nbsp;&nbsp;&nbsp;&nbsp; 6/8
            </a>
          </h4>
        </div>

        <div class="panel-collapse collapse in" id="collapseOne">
          <div class="panel-body">
            <table class="table table-hover">
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> Revisión Jefe De Compras</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> Subgerencia Admnistración</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> Departamento Gestión Personas, Administración y Finanzas</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> TDR Devuelto a Usuario</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> TDR en Fiscalia</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" checked name="form-field-checkbox">
                      <span class="lbl"> Firma Dirección</span>
                    </label>
                  </div>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Oficina de Partes: </span>
                    </label> 
                  </div>
                </td>
                <td>Nº TDR<input type="text"> y Fecha TDR: <input type="text"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
              &nbsp;Etapa II: Publicación Mercado Público &nbsp;&nbsp;&nbsp;&nbsp; 0/4
            </a>
          </h4>
        </div>

        <div class="panel-collapse collapse" id="collapseTwo">
          <div class="panel-body">
            <table border="0" cellspacing="0" class="table table-hover">
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                    <span class="lbl"> Fecha de Publicación </span></label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>                        
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Consultas: </span>
                    </label>
                  </div>
                </td>
                <td>
                    Inicio <input type="text" placeholder="dd-mm-aaaa">
                    Fin <input type="text" placeholder="dd-mm-aaaa">
                </td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Respuestas: </span>
                    </label>
                  </div>
                </td>
                <td>
                    Inicio <input type="text" placeholder="dd-mm-aaaa">
                    Fin <input type="text" placeholder="dd-mm-aaaa">
                </td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Selección Oferta </span>
                    </label>
                  </div>
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
              &nbsp;Etapa III: Contrato&nbsp;&nbsp;&nbsp;&nbsp; 0/10
            </a>
          </h4>
        </div>

        <div class="panel-collapse collapse" id="collapseThree">
          <div class="panel-body">
            <table class="table table-hover">
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Pendiente en Ejecutivo </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Nota Enviada a Fiscalía </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Contrato Elaborado </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Enviar Contrato a Proveedor </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Garantias </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Contrato Firmado por Proveedor </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Resolución Aprovación de Contrato </span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Publicación Ficha Contrato</span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Se Adjunta a Portal</span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="ace" name="form-field-checkbox">
                      <span class="lbl"> Se Envia OC al Proveedor</span>
                    </label>
                  </div>
                </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
              <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
              &nbsp;Etapa IV: Recepción Productos</a>
          </h4>
        </div>

        <div class="panel-collapse collapse" id="collapseFour">
          <div class="panel-body">
            <table class="table table-hover">
              <tr>
                <td>Fecha Estimada: </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>Fecha Real: </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>Estado: </td>
                <td>
                  <select id="form-field-select-1">
                    <option value="0">Seleccione...</option>
                    <option value="1">Pendiente</option>
                    <option value="2">Recepción Parcial</option>
                    <option value="3">Recepción Total</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
              <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
              &nbsp;Etapa V: Pago
            </a>
          </h4>
        </div>

        <div class="panel-collapse collapse" id="collapseFive">
          <div class="panel-body">
            <table class="table table-hover">
              <tr>
                <td>Fecha Estimada Pago: </td>
                <td><input type="text" placeholder="dd-mm-aaaa"></td>
              </tr>
              <tr>
                <td>Estado: </td>
                <td>
                  <select id="form-field-select-1">
                    <option value="0">Seleccione...</option>
                    <option value="1">Pagado</option>
                    <option value="2">Pagado Parcial</option>
                    <option value="3">Pendiente Pago</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
    </div>

    <!-- /section:elements.accordion -->
  </div><!-- /.col --><!-- /.col -->
</div>

<div class="clearfix form-actions">
  <div class="col-md-offset-3 col-md-9">
    <button type="button" class="btn btn-info">
      <i class="ace-icon fa fa-check bigger-110"></i>
      Guardar
    </button>
  </div>
</div>
@stop

@section('specific-scripts')
<script type="text/javascript">
  $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      //if($(e.target).attr('href') == "#home") doSomethingNow();
  })

  
  /**
    //go to next tab, without user clicking
    $('#myTab > .active').next().find('> a').trigger('click');
  */


  $('#accordion-style').on('click', function(ev){
    var target = $('input', ev.target);
    var which = parseInt(target.val());
    if(which == 2) $('#accordion').addClass('accordion-style2');
     else $('#accordion').removeClass('accordion-style2');
  });
</script>
@stop
