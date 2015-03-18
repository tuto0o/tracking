$(document).ready(function(){
	$('#btnIngresoSolicitud').on('click', function(){
			/*$('#wrap').block({ 
				message:  '<img src="assets/images/loading50x50.gif" />'
			});*/
			
			var validar		= 0;
			
			if ($('#txtNombreSolicitud').val()==""){
				validar++;
			}
			if ($('#txtFechaEntrega').val()==""){
				validar++;
			}
			if ($('#txtDescripcion').val()==""){
				validar++;
			}
			console.log(validar);
			if (validar==0){
				$("#frmIngresar").ajaxForm({
					success: function(result){		
						console.log('bien');
						//$('#wrap').unblock();
					}
				}).submit();
			}
			
	});
	
});

$(document).ready(function(){
	$('#btnGuardarDatos').on('click', function(){
			/*$('#wrap').block({ 
				message:  '<img src="assets/images/loading50x50.gif" />'
			});*/
			$("#frmGuardar").ajaxForm({
				success: function(result){		
					console.log('bien');
					//$('#wrap').unblock();
				}
			}).submit();
			
	});
	
});