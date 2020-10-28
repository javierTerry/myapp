<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MásNegocio - Interno</title>

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
	

	<script type="text/javascript" src="{{{ URL::asset('/js/jquery-2.1.4.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('/js/jquery-ui.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('/js/jquery.dataTables.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('/js/jquery.dataTables.bootstrap.min.js')}}}"></script>
	<script type="text/javascript" src="{{{ URL::asset('/js/dataTables.buttons.min.js')}}}"></script>
	
  	<script type="text/javascript" src="{{{ URL::asset('/js/jquery.jqGrid.min.js')}}}"></script>
  		<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	
	<script type="text/javascript" src="{{URL::asset('/js/bootstrap.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('/js/jquery.maskMoney.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('/js/ace-extra.min.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('/js/ace.min.js')}}" ></script>


	
</head>
<body class="no-skin">

	@section('sidebar')
      
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
							HOMEBLACK LOGIN 1
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

	@show 		
		

		<div class="main-content">

			<div class="main-content-inner">
				<div class="page-content">
					
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="panel panel-default">
									<div class="panel-body">
										@if (count($errors) > 0)
											<div class="alert alert-danger">
												<strong>Whoops!</strong> Favor de validar los datos.<br><br>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif

										<form class="form-horizontal" role="form" method="POST" action="{{ url('/post-login') }}">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">

											<div class="form-group">
												<label class="col-md-4 control-label">E-Mail</label>
												<div class="col-md-6">
													
													<input type="email" class="form-control" name="email" value="{{ old('email') }}">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Password</label>
												<div class="col-md-6">
													<input type="password" class="form-control" name="password">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<div class="checkbox">
														<label>
															<input type="checkbox" name="remember"> Recordar
														</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<button type="submit" class="btn btn-primary">Login</button>

													<a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>		 

				</div> <!-- main-content -->
			</div> <!-- class="main-content-inner" -->
		</div> <!-- main-content -->

		

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">MasNegocio  Login</span>
						 &copy; 2017-2021
					</span>
				</div>
			</div>
		</div> <!-- FOOTER -->
    
	</div> <!-- /main-container -->
	 


</body> <!-- no-skin -->
</html>
