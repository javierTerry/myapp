<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MásNegocio - Interno</title>

	<!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	-->
	<!-- BOOTSTRAPS & FONTAWESOME -->
	
	<link href="{{ asset('/css/new/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/font-awesome/4.5.0/css/font-awesome.min.css') }}" rel="stylesheet">


	<!-- FUENTES DE TEXTO . CSS -->
	<link href="{{ asset('/css/new/fonts.googleapis.com.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/ace.min.css') }}" rel="stylesheet" class="ace-main-stylesheet" id="main-ace-style">
	<link href="{{ asset('/css/new/ace-skins.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/ace-rtl.min.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	

	<script type="text/javascript" src="{{{ URL::asset('js/jquery-2.1.4.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/jquery-ui.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/jquery.dataTables.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/jquery.dataTables.bootstrap.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/dataTables.buttons.min.js')}}}"></script>
	
  	<script type="text/javascript" src="{{{ URL::asset('js/jquery.jqGrid.min.js')}}}"></script>
  		<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/jquery.maskMoney.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/ace-extra.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/ace.min.js')}}" ></script>


	
</head>
<body class="no-skin">
	<div id="navbar" class="navbar navbar-default  ace-save-state">
		
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							HOMEBLACK
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<!-- <img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" /> -->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<!-- <img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" /> -->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<!-- <img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" /> -->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<!-- <img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" /> -->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<!-- <img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" /> -->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>



						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,
									</br>
										{{Auth::user()->name}}
									</small>
									
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{ url('/auth/logout') }}">  
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li> <!-- light-blue dropdown-modal -->

					</ul> <!-- nav ace-nav -->
					
				</div> <!-- navbar-buttons navbar-header pull-right -->

			</div> <!-- navbar-container -->
		
	</div> <!-- id="navbar" -->


	<div class="main-container ace-save-state" id="main-container">
		

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

					


			<!-- Menu 
			@include('Menu/sidebar-shortcuts') 
			-->
			@include('Menu/principal')
		</div> <!-- sidebar -->
		

		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">
					
				
				 @yield('content')

				</div> <!-- main-content -->

			</div> <!-- class="main-content-inner" -->
		</div> <!-- main-content -->

		

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">MasNegocio</span>
						 &copy; 2017-2020
					</span>
				</div>
			</div>
		</div> <!-- FOOTER -->

	    
	</div> <!-- /main-container -->
	 

	 
	<!-- Scripts -->


<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = 
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null,null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],
			
			 "columnDefs": [
	            {
	                "targets": [ 0 ],
	                "visible": false,
	                "searchable": false
	            }
	        ]
	
			,select: {
				style: 'multi'
			}
			, "pagingType": "full_numbers"
			,language: {
			    "decimal": "",
			    "emptyTable": "No hay información",
			    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
			    "infoPostFix": "",
			    "thousands": ",",
			    "lengthMenu": "Mostrar _MENU_ Entradas",
			    "loadingRecords": "Cargando...",
			    "processing": "Procesando...",
			    "search": "Buscar:",
			    "zeroRecords": "Sin resultados encontrados",
			    "paginate": {
			        "first": "Primero",
			        "last": "Ultimo",
			        "next": "Siguiente",
			        "previous": "Anterior"
			    }
			}
	    } );
		
	
	});
</script>


	<script>
  $(function() {
    $( "#fecha_ing" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
     $( "#fecha_inicio" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
     $( "#fecha_final" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
    $( "#fecha_baja" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
    $( "#fecha_cambio" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
    //DATAPICKER BPO
    $( ".date" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
    
    $("input.maskMoney_").maskMoney({showSymbol:true, symbol:"", decimal:".", thousands:","});
  
  });
  </script>
</body> <<!-- no-skin -->
</html>
