<!DOCTYPE html>
<html lang="fr" class=" ">
<head> 
	<meta charset="utf-8" />
	<title>{{ config('app.title') }}</title>
	<meta name="description" content="Web app by Richmond KOUASSI (krak225@gmail.com)" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="{{ asset('css/select2.css')}}" type="text/css"/>	
	<link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" /> 
	<link rel="stylesheet" href="{{ asset('js/datatables/datatables.css') }}" type="text/css"/> 
	<link rel="stylesheet" href="{{ asset('css/app.v1_vert.css') }}" type="text/css" /> 
	<!--link rel="stylesheet" href="{{ asset('css/app.v1_orange.css') }}" type="text/css" /--> 
	<link rel="stylesheet" href="{{ asset('js/fuelux/fuelux.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('css/krakPopup.css')}}"/>	
	<link rel="stylesheet" href="{{ asset('css/todo.css')}}"/>	
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/contextual.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contextual.css') }}">
	
    <!--link rel="stylesheet" type="text/css" href="{{ asset('css/summernote/summernote.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/summernote/summernote.css') }}"-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
		}
		.div-button{
			display: flex;
			align-items: center;
			left: 40%;
			margin-top: 10px;
			margin-bottom: 0px;
		}
		.text-area{
			width: 400px;
		}
		.text-area-1{
			width: 300px;
			height: 90px;
		}
		.event-button{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.event-button .event{
			display: flex;
			margin: 0px 5px;
			align-items: center;
		}

	</style>
	
	<!--[if lt IE 9]> 
	<script src="js/ie/html5shiv.js"></script> 
	<script src="js/ie/respond.min.js"></script> 
	<script src="js/ie/excanvas.js"></script> 
	<![endif]-->
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript">
		var csrf_token   =   $('meta[name="csrf-token"]').attr('content');
		$.ajaxSetup({
			headers: {"X-CSRF-TOKEN": csrf_token}
		});
		
	</script>

</head>
<body class="container"> 
	<section class="vbox">
		<header class="bg-primary header navbar navbar-fixed-top-xs"> 
		
		<!--div class="navbar-header aside-md tex"> 
		<span style="background:white url({{ asset('images/logo.png') }}) center no-repeat;background-size:contain;display:block;border:3px solid 029838;"> 
			<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a> 
			<a href="{{ route('home') }}" class="navbar-brand">
			
			</a> 
			<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> 
		</span> 
		</div--> 
		
		<div class="navbar-header aside-md" style="background:white;color:orange;border:1px solid #65bd77"> 
		<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html" style="color:orange"> 
		<i class="fa fa-bars"></i> </a> 
		<a href="#" class="navbar-brand" data-toggle="fullscreen" style="font-size:12px;background:white;color:orange">
		{{ config('app.name') }}
		</a>
		<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user" style="color:orange"> 
		<i class="fa fa-cog"></i> 
		</a> 
		</div> 
 
 
		 <ul class="nav navbar-nav hidden-xs"> 
			<li class="dropdown"> 
				<a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-building-o"></i> 
					<span class="font-bold">{{ config('app.subtitle') }}</span> 
				</a> 				 
			 </li> 
			<li> 
				<div class="m-t m-l"> 
					<a href="#" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade">{{ config('app.version') }}</a> 
				</div>
			</li> 
		 </ul> 
		 <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user"> 
		 @auth
		 <li class="dropdown"> 
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			<span class="thumb-sm avatar pull-left">
			@if(File::exists('images/'. Auth::user()->photo ) && !is_dir('images/'. Auth::user()->photo))
			<img src="{{ asset('images/'. Auth::user()->photo ) }}" alt=""/>
			@else
			<img src="{{ asset('images/avatar.jpg') }}"/>
			@endif
			
			</span> {{ Auth::user()->nom . ' ' . Auth::user()->prenoms }} <b class="caret"></b> 
			</a> 
			<ul class="dropdown-menu animated fadeInRight"> 
				<span class="arrow top"></span> 
				<li> <a href="{{ route('profile') }}">Mon compte</a> </li> 
				<li> <a href="{{ route('updatePassword') }}">Mot de passe</a> </li> 
				<li class="divider"></li> 
				
				<li>
					<a href="{{ route('logout') }}"
					onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					Se déconnecter
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul> 
		 </li>
		 @endauth
		 </ul> 
		 </header> 
		 <section> 
			<section class="hbox stretch"> 
				<!-- .aside --> 
				<aside class="bg-dark aside-md hidden-print hidden-xs" id="nav"> 
					<section class="vbox"> 
						<section class="w-f scrollable"> 
							<div class=" " data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333"> 
							<!-- nav --> 
							<nav class="nav-primary hidden-xs"> 
								<ul class="nav">
									<li>
										<div class="" style="padding:15px;"> 
											MENU PRINCIPAL
										</div> 
									</li>
									@auth

									

										   {{-- liste de presence --}}
									<li class="@if(Request::is('participants')) active @endif"> 
										<a href="#" class=""> 
											<i class="fa fa-list icon"> 
											<b class="bg-info"></b> </i> 
												<span class="pull-right"> 
											   <i class="fa fa-angle-down text"></i> 
											   <i class="fa fa-angle-up text-active"></i> 
											</span> 
											<span>LISTE DE PRESENCE</span> 
										</a> 
										<ul class="nav lt"> 
											<li class=""> 
												<a href="{{route('reunion')}}" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Nouvelle liste</span> </a> 
											</li> 
										   <li class=""> 
											   <a href="{{route('participants')}}" class="active"> 
											   <i class="fa fa-angle-right"></i> 
											   <span>Tous les participants</span> </a> 
										   </li> 
										   <li class=""> 
											<a href="{{route('Societes')}}" class="active"> 
											<i class="fa fa-angle-right"></i> 
											<span>Liste des sociétés</span> </a> 
										</li> 
										</ul> 
								   </li>

								   <li class="@if(Request::is('events')) active @endif"> 
									<a href="#" class=""> 
										<i class="fa fa-list icon"> 
										<b class="bg-info"></b> </i> 
										<span class="pull-right"> 
										   <i class="fa fa-angle-down text"></i> 
										   <i class="fa fa-angle-up text-active"></i> 
										</span> 
										<span>AGENDA</span> 
									</a> 
									<ul class="nav lt"> 
									   <li class=""> 
										   <a href="{{route('events')}}" class="active"> 
										   <i class="fa fa-angle-right"></i> 
										   <span>Tous les évènements</span> </a> 
									   </li> 
									</ul> 
							   </li>

									@else
									<li> 
										<a href="{{ route('login') }}" class="active"> 
											<i class="fa fa-columns icon"> 
											<b class="bg-info"></b> </i>
											<span>Se connecter</span> 
										</a> 
									</li>
									@endauth
									
								</ul>
								
								
								
								
							</nav> 
							<!-- / nav --> 
							</div> 
						</section> 
						<footer class="footer lt hidden-xs b-t b-dark"> 
							
						</footer>
						
					</section> 
					</aside> 
					<!-- /.aside --> 
					<section id="content">
					 
						
						<section class="scrollable padder"> 
							
							
							<!----> 
							
							@yield('content')
							
							<!----> 
							
							
						</section>
						
						
					</section> 
					<aside class="bg-light lter b-l aside-md hide" id="notes"> 
						<div class="wrapper"></div> 
					</aside> 
			</section> 
		</section> 
	</section> 
	 
	 
	<div id="dialogKrakPopup"></div>
	
	<!-- Bootstrap --> 
	 
	 
	<audio id="audio">
	  <source src="eventually.ogg" type="audio/ogg">
	  <source src="eventually.mp3" type="audio/mp3">
	</audio>

	 
	 <!-- App --> 
	 <script src="{{ asset('js/app.v1.js') }}"></script> 
	 <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
	 <script src="{{ asset('js/datatables/jquery.csv-0.71.min.js') }}"></script>
	 <script src="{{ asset('js/kraksoft.js') }}"></script> 
	 <script src="{{ asset('js/pubnub.js') }}"></script> 
	 <script src="{{ asset('js/app.plugin.js') }}"></script> 
	 
	 <!-- fuelux -->
	 <script src="{{asset('js/fuelux/fuelux.js') }}"></script>
	 <script src="{{asset('js/parsley/parsley.min.js') }}"></script>
	 
	 
	 <script src="{{asset('js/jquery.mask.js') }}"></script>
	 <script src="{{asset('js/select2.js') }}"></script>
	 
	 <script src="{{asset('js/todo_drag.js') }}"></script>
	 
	<script src="{{asset('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<script src="{{asset('js/jquery.krakPopup.js') }}"></script>
	 
	<script src="{{ asset('js/noty/jquery.noty.js') }}"></script>
	<script src="{{ asset('js/noty/layouts/bottomCenter.js') }}"></script>
	<script src="{{ asset('js/noty/layouts/topRight.js') }}"></script>
	<script src="{{ asset('js/noty/layouts/top.js') }}"></script>
	<script src="{{ asset('js/noty/layouts/center.js') }}"></script>
	<script src="{{ asset('js/noty/themes/default.js') }}"></script>
	
	<script src="{{ asset('js/contextual.js') }}"></script>

	
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

	
	<input type="hidden" id="eco_base_url" value="{{'http://'.$_SERVER['HTTP_HOST']}}/">

		<script>
				
		</script>
 
 </body>
</html>