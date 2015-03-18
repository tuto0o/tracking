<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
    {{ HTML::style('/assets/css/bootstrap.css') }}
    {{ HTML::style('/assets/css/font-awesome.css') }}
		<!--<link rel="stylesheet" href="../../../public/examples/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../../../public/examples/assets/css/font-awesome.css" />-->

		<!-- text fonts -->
    {{ HTML::style('/assets/css/ace-fonts.css') }}
		<!--<link rel="stylesheet" href="../../../public/examples/assets/css/ace-fonts.css" />-->

		<!-- ace styles -->
    {{ HTML::style('/assets/css/ace.css') }}
		<!--<link rel="stylesheet" href="../../../public/examples/assets/css/ace.css" />-->
		{{ HTML::style('/assets/css/ace-rtl.css') }}
		<!--<link rel="stylesheet" href="../../../public/examples/assets/css/ace-rtl.css" />-->
	</head>
	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="grey" id="id-text2">Administrador</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Porfavor Ingrese Sus Datos
											</h4>

											<div class="space-6"></div>

											<form method="POST" name="frmIngresar" action="{{ URL::to('login')}}">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="txtUsuario" type="text" class="form-control" placeholder="Usuario" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="txtClave" type="password" class="form-control" placeholder="Contraseña" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">


														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Ingresar</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix" style="font-size:12">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													Recuperar contraseña?
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Recuperar contraseña
											</h4>

											<div class="space-6"></div>
											<p>
												Ingrese su email y siga las intrucciones
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Recuperar</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Volver al login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box --><!-- /.signup-box -->
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

    {{ HTML::script('/assets/js/jquery.js') }}
		{{ HTML::script('/assets/js/jquery.mobile.custom.js') }}

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			function inicio(){
				window.location.href = "{{ URL::to('estadoSolicitudes') }}";
			}
    </script>
	</body>
</html>
