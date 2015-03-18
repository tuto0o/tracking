<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

			<!-- bootstrap & fontawesome -->
      {{ HTML::style('/assets/css/bootstrap.css') }}
      {{ HTML::style('/assets/css/font-awesome.css') }}
  		
      {{ HTML::style('/assets/css/datepicker.css') }}
      
      <!-- text fonts -->
      {{ HTML::style('/assets/css/ace-fonts.css') }}
  
      <!-- ace styles -->
      {{ HTML::style('/assets/css/ace.css') }}
      {{ HTML::style('/assets/css/ace-rtl.css') }}
			{{ HTML::script('/assets/js/ace-extra.js') }}
      
      <!-- page specific plugin styles -->
      @yield('specefic-styles')
      
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							Administrador
						</small>
					</a>



				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						@yield('notifications')

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									{{ Session::get('usuNombre') }}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li class="divider"></li>

								<li>
									<a href="{{ URL::to('/') }}">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						
            @yield('buttons-user')

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					@yield('menu')
				</ul>
				<!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						
            @yield('content')

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Admin</span>
							&copy; 2014-2015
						</span>

						&nbsp; &nbsp;
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		
		{{ HTML::script('/assets/js/jquery.js') }}
		{{ HTML::script('/assets/js/jquery.mobile.custom.js') }}
		<!-- <![endif]-->
		
    {{ HTML::script('/assets/js/bootstrap.js') }}
    
    <!-- ace scripts -->
    {{ HTML::script('/assets/js/ace/elements.scroller.js') }}
    {{ HTML::script('/assets/js/ace/elements.colorpicker.js') }}
    {{ HTML::script('/assets/js/ace/elements.fileinput.js') }}
    {{ HTML::script('/assets/js/ace/elements.typeahead.js') }}
    {{ HTML::script('/assets/js/ace/elements.wysiwyg.js') }}
    {{ HTML::script('/assets/js/ace/elements.spinner.js') }}
    {{ HTML::script('/assets/js/ace/elements.treeview.js') }}
    {{ HTML::script('/assets/js/ace/elements.wizard.js') }}
    {{ HTML::script('/assets/js/ace/elements.aside.js') }}
    {{ HTML::script('/assets/js/ace/ace.js') }}
    {{ HTML::script('/assets/js/ace/ace.ajax-content.js') }}
    {{ HTML::script('/assets/js/ace/ace.touch-drag.js') }}
    {{ HTML::script('/assets/js/ace/ace.sidebar.js') }}
    {{ HTML::script('/assets/js/ace/ace.sidebar-scroll-1.js') }}
    {{ HTML::script('/assets/js/ace/ace.submenu-hover.js') }}
    {{ HTML::script('/assets/js/ace/ace.widget-box.js') }}
    {{ HTML::script('/assets/js/ace/ace.settings.js') }}
    {{ HTML::script('/assets/js/ace/ace.settings-rtl.js') }}
    {{ HTML::script('/assets/js/ace/ace.settings-skin.js') }}
    {{ HTML::script('/assets/js/ace/ace.widget-on-reload.js') }}
    {{ HTML::script('/assets/js/ace/ace.searchbox-autocomplete.js') }}
    
    <!-- page specific plugin scripts -->
    @yield('specific-scripts')
    
	</body>
</html>
