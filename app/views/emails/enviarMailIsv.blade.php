<?php
$campo_01	= "font-size:10.0pt;	font-family:Century Gothic,sans-serif;	color:black";
$campo_02 = "font-size:10.0pt; font-family:Century Gothic,sans-serif";
$campo_03 = "color:#365F91";
$campo_04 = "text-indent:35.4pt";
$campo_05 = "font-size:10.0pt; font-family:Century Gothic,sans-serif;color:black";
$campo_06 = "color:white;	background:navy;	mso-highlight:navy";
$campo_07 = "color:#1F497D";
$campo_08 = "border:none;	border-top:solid red 4.5pt;	background:#333333; padding:7.5pt 7.5pt 7.5pt 7.5pt";
$campo_09 = "font-size:12.0pt;	font-family:Verdana,sans-serif;	color:#CCCCCC";
$campo_10 = "mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;	text-align:right";
$campo_11 = "font-size:7.5pt;	font-family:Verdana,sans-serif;	color:#CCCCCC";
$campo_12 = "font-size:8.5pt;	font-family:Verdana,sans-serif;	color:#CCCCCC";
$spacio  	= "padding:4px 10px";
?>
<div class=Section1>
    <p >
    	<b>
      <span style='{{ $campo_01 }}'>Sres. {{ $nombreCli; }}</span></b><span style='{{ $campo_02 }}'>,<span style='{{ $campo_07 }}'><o:p></o:p></span></span>
    </p>
    <p  style='{{ $campo_04 }}'>
    	<span style='{{ $campo_02 }}'>
    	Se les informa que la plataforma 
    	<b>InStore<span style='{{ $campo_03 }}'>View</span></b>
    	ya se encuentra actualizado con la información B2B de sus clientes.<o:p></o:p>
    	</span>
    </p>
    <p  style='{{ $campo_04 }}'>
    <span style='{{ $campo_05 }}'>
    La última carga de información fue realizada el día <b>{{ $fechaActu; }}.</b>
    </span>
    <span style='{{ $campo_02 }}'> <o:p></o:p></span>
    </p>
    <p  style='{{ $campo_04 }}'>
    <span style='{{ $campo_02 }}'>
    La información B2B actualizada por cadena corresponde a las	siguientes fechas:<o:p></o:p>
    </span>
    </p>
    
    <!-- FOR POR CADENA -->
    <table style='margin-left:35.4pt' border='0' cellspacing="0">
      <tr style='{{ $spacio }}'>
        <th><span style='{{ $campo_01 }}'>Cadena</span></th>
        <th><span style='{{ $campo_01 }}'>Fecha</span></th>
        @if($comentVacio!=0)
        <th><span style='{{ $campo_01 }}'>Observaci&oacute;n</span></th>
      	@endif
      </tr>
     	@foreach($dCadena	as $key => $value)
      <tr style='{{ $spacio }}'>
        <td><span style='{{ $campo_01 }}'>{{ $value['nombreCadena'] }}</span></td>
        <td><span style='{{ $campo_01 }}'>{{ $value['fechaCadena'] }}</span></td>
        @if($comentVacio!=0)
        <td><span style='{{ $campo_01 }}'>{{ $value['comentCadena'] }}</span></td>
      	@endif
      </tr>
      @endforeach
    </table>
    <!-- FIN FORM POR CADENA -->
    <p  style='{{ $campo_04 }}'>
    <span style='{{ $campo_02 }}'>
    Para acceder a la plataforma, deben ingresar a 
    <a href=\http://www.instoreview.cl\>www.instoreview.cl</a> / &nbsp;
    <b>
    <span style='{{ $campo_06 }}'>iniciar sesión</span>
    </b>
    </span>
    </p>
    <p  style='{{ $campo_04 }}'>
    <span style='{{ $campo_02 }}'>
    Cualquier duda, favor contactarnos en: <a href=\mailto:bi@techk.cl\>bi@techk.cl</a>
    </span><span style='{{ $campo_07 }}'><o:p></o:p></span>
    </p>
    <table border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%'>
      <tr>
        <td style='{{ $campo_08 }}'>
        <p>
        <img src="{{ $message->embed(public_path().'/assets/images/firma.png') }}"  />
        <o:p></o:p></p>
        </td>
        <td style='{{ $campo_08 }}'>
          <p align='right' style='text-align:right'><b>
          <span style='{{ $campo_09 }}'>
          Business Intelligence <o:p></o:p>
          </span>
          </b></p>
          <p  align='right' style='{{ $campo_10 }}'>
          <span style='{{ $campo_11 }}'>
          Rosario Norte 555 Of. 803 | Las Condes | Santiago<br>
          F: (56-2) 2244 11 21
          </span>
          <a href='http://www.techk.cl/'>
          <b><span style='{{ $campo_12 }}'>www.techk.cl</span></b></a>
          <span style='{{ $campo_11 }}'><o:p></o:p></span></p>
        </td>
      </tr>
    </table>
</div>