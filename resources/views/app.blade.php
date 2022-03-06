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


	<!-- FUENTES DE TEXTO . CSS  -->
	<link href="{{ asset('/css/new/fonts.googleapis.com.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/ace.min.css') }}" rel="stylesheet" class="ace-main-stylesheet" id="main-ace-style">
	<link href="{{ asset('/css/new/ace-skins.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/ace-rtl.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/datatables/buttons.1.6.2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/new/jquery-ui.min.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	
	<!-- FUENTES DE JQUERY . JS  -->
  <script type="text/javascript" src="{{{ URL::asset('js/jquery-2.1.4.min.js')}}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script type="text/javascript" src="{{{ URL::asset('js/jquery.dataTables.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/jquery.dataTables.bootstrap.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('js/dataTables.buttons.min.js')}}}"></script>
  <script type="text/javascript" src="{{{ URL::asset('js/jquery.jqGrid.min.js')}}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" ></script>

  
  <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>	
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/jquery.maskMoney.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/ace-extra.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('js/ace.min.js')}}" ></script>
	
</head>
<body class="no-skin">
	<div id="navbar" class="navbar navbar-default ace-save-state">
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
	
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									{{Auth::user()->name}}
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
									<a href="profile.html">
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
						</li>
					</ul>
				</div> <!-- role="navigation" -->

		</div> <!-- navbar-container -->
	</div> <!-- navbar -->

	<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<!-- Menu  -->
				@include('Menu/sidebar-shortcuts') 
				@include('Menu/principal')
			</div> <!-- sidebar -->

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						@include('errors.parcial.campos_error')
						@include('errors.parcial.campos_notices')
						@include('errors.parcial.success')
					
					<!-- --> 	
					 @yield('content')

					
					</div> <!-- main-content -->

				</div> <!-- class="main-content-inner" -->
			</div> <!-- main-content -->





	</div> <!-- id="main-container" -->

	<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">MasNegocio</span>
						 &copy; 2017-2021
					</span>
				</div>
			</div>
		</div> <!-- FOOTER -->
</body>
		
<!-- Scripts -->

<script type="text/javascript">
	jQuery(function($) {
		//jquery tabs
		$( "#tabs" ).tabs();

		//initiate dataTables plugin
		var myTable = 
		$('#dynamic-table')
		.DataTable( {
				select: {
					style: 'multi'
				}
				,"order": [[ 0, "desc"]] 
				,dom: 'Bfrtip'
				,buttons: [
					{
						extend: 'csv',
			      exportOptions: {
			        columns: ':not(.notexport)'
			        }
			     }
			    ,{
            extend: 'pdf'
            ,footer: true
            ,orientation: 'landscape'
            , pageSize: 'A3'
          	,exportOptions: {
                    columns: ':not(.notexport)'
                } 
            
        	}
			  ]

				, "pagingType": "full_numbers"
				,"lengthMenu": [[25, 50, 75, -1], [ 25, 50,75, "All"]]

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
	    });


		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});
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
  
  	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
		,dateFormat: 'yy-mm-dd' 
	})

});
</script>
</body> <!-- no-skin -->
</html>