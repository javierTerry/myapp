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
							HOMEBLACK LOGIN
						</small>
					</a>
				</div>

				

			</div> <!-- navbar-container -->
		
	</div> <!-- id="navbar" -->


	<div class="main-container ace-save-state" id="main-container">
		

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

					


			<!-- Menu 
				NO SE GENERA MENO YA QUE ES UN ACCESO DE LOGIN

			-->
			
		</div> <!-- sidebar -->
		

		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">
					
				
				 @yield('contentLogin')

				</div> <!-- main-content -->

			</div> <!-- class="main-content-inner" -->
		</div> <!-- main-content -->

		

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">MasNegocio  Login</span>
						 &copy; 2017-2020
					</span>
				</div>
			</div>
		</div> <!-- FOOTER -->

	    
	</div> <!-- /main-container -->
	 



</body> <<!-- no-skin -->
</html>
