<!DOCTYPE html>
<html lang="fr" class=" ">
<head> 
	<meta charset="utf-8" />
	<title><?php echo e(config('app.title')); ?></title>
	<meta name="description" content="Web app by Richmond KOUASSI (krak225@gmail.com)" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="<?php echo e(asset('css/select2.css')); ?>" type="text/css"/>	
	<link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>" type="text/css" /> 
	<link rel="stylesheet" href="<?php echo e(asset('js/datatables/datatables.css')); ?>" type="text/css"/> 
	<link rel="stylesheet" href="<?php echo e(asset('css/app.v1_vert.css')); ?>" type="text/css" /> 
	<!--link rel="stylesheet" href="<?php echo e(asset('css/app.v1_orange.css')); ?>" type="text/css" /--> 
	<link rel="stylesheet" href="<?php echo e(asset('js/fuelux/fuelux.css')); ?>" type="text/css"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/krakPopup.css')); ?>"/>	
	<link rel="stylesheet" href="<?php echo e(asset('css/todo.css')); ?>"/>	
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/contextual.theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/contextual.css')); ?>">
	
    <!--link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/summernote/summernote.js')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/summernote/summernote.css')); ?>"-->
	
	
	<!--[if lt IE 9]> 
	<script src="js/ie/html5shiv.js"></script> 
	<script src="js/ie/respond.min.js"></script> 
	<script src="js/ie/excanvas.js"></script> 
	<![endif]-->
	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
		<span style="background:white url(<?php echo e(asset('images/logo.png')); ?>) center no-repeat;background-size:contain;display:block;border:3px solid 029838;"> 
			<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a> 
			<a href="<?php echo e(route('home')); ?>" class="navbar-brand">
			
			</a> 
			<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> 
		</span> 
		</div--> 
		
		<div class="navbar-header aside-md" style="background:white;color:orange;border:1px solid #65bd77"> 
		<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html" style="color:orange"> 
		<i class="fa fa-bars"></i> </a> 
		<a href="#" class="navbar-brand" data-toggle="fullscreen" style="font-size:12px;background:white;color:orange">
		<?php echo e(config('app.name')); ?>

		</a>
		<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user" style="color:orange"> 
		<i class="fa fa-cog"></i> 
		</a> 
		</div> 
 
 
		 <ul class="nav navbar-nav hidden-xs"> 
			<li class="dropdown"> 
				<a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-building-o"></i> 
					<span class="font-bold"><?php echo e(config('app.subtitle')); ?></span> 
				</a> 				 
			 </li> 
			<li> 
				<div class="m-t m-l"> 
					<a href="#" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><?php echo e(config('app.version')); ?></a> 
				</div>
			</li> 
		 </ul> 
		 <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user"> 
		 <?php if(auth()->guard()->check()): ?>
		 <li class="dropdown"> 
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
			<span class="thumb-sm avatar pull-left">
			<?php if(File::exists('images/'. Auth::user()->photo ) && !is_dir('images/'. Auth::user()->photo)): ?>
			<img src="<?php echo e(asset('images/'. Auth::user()->photo )); ?>" alt=""/>
			<?php else: ?>
			<img src="<?php echo e(asset('images/avatar.jpg')); ?>"/>
			<?php endif; ?>
			
			</span> <?php echo e(Auth::user()->nom . ' ' . Auth::user()->prenoms); ?> <b class="caret"></b> 
			</a> 
			<ul class="dropdown-menu animated fadeInRight"> 
				<span class="arrow top"></span> 
				<li> <a href="<?php echo e(route('profile')); ?>">Mon compte</a> </li> 
				<li> <a href="<?php echo e(route('updatePassword')); ?>">Mot de passe</a> </li> 
				<li class="divider"></li> 
				
				<li>
					<a href="<?php echo e(route('logout')); ?>"
					onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					Se déconnecter
					</a>
					<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
						<?php echo e(csrf_field()); ?>

					</form>
				</li>
			</ul> 
		 </li>
		 <?php endif; ?>
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
									<?php if(auth()->guard()->check()): ?>

									<li class="<?php if(Request::is('categories')): ?> active <?php endif; ?>"> 
										 <a href="#" class=""> 
											 <i class="fa fa-cogs icon"> 
											 <b class="bg-info"></b> </i> 
											 <span class="pull-right"> 
												<i class="fa fa-angle-down text"></i> 
												<i class="fa fa-angle-up text-active"></i> 
											 </span> 
											 <span>CATEGORIES</span> 
										 </a> 
										 <ul class="nav lt"> 
											<li class=""> 
												<a href="<?php echo e(route('categories')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Tous les catégories</span> </a> 
											</li> 
										 </ul> 
									</li>

									<li class="<?php if(Request::is('produits')): ?> active <?php endif; ?>"> 
										 <a href="#" class=""> 
											 <i class="fa fa-list icon"> 
											 <b class="bg-info"></b> </i> 
											 <span class="pull-right"> 
												<i class="fa fa-angle-down text"></i> 
												<i class="fa fa-angle-up text-active"></i> 
											 </span> 
											 <span>PRODUITS</span> 
										 </a> 
										 <ul class="nav lt"> 
											<li class=""> 
												<a href="<?php echo e(route('produits')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Tous les produits</span> </a> 
											</li> 
											<!--li class=""> 
												<a href="<?php echo e(route('produits')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Enregistrer un produits</span> </a> 
											</li--> 
										 </ul> 
									</li>

									<li class="<?php if(Request::is('commandes')): ?> active <?php endif; ?>"> 
										 <a href="#" class=""> 
											 <i class="fa fa-list icon"> 
											 <b class="bg-info"></b> </i> 
											 <span class="pull-right"> 
												<i class="fa fa-angle-down text"></i> 
												<i class="fa fa-angle-up text-active"></i> 
											 </span> 
											 <span>COMMANDES</span> 
										 </a> 
										 <ul class="nav lt"> 
											<li class=""> 
												<a href="<?php echo e(route('commandes')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Toutes les commandes</span> </a> 
											</li> 
											<!--li class=""> 
												<a href="<?php echo e(route('commandes')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Commandes livrées</span> </a> 
											</li> 
											<li class=""> 
												<a href="<?php echo e(route('commandes')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Commandes non livrées</span> </a> 
											</li-->
										 </ul> 
									</li>


									<li class="<?php if(Request::is('courses')): ?> active <?php endif; ?>"> 
										 <a href="#" class=""> 
											 <i class="fa fa-list icon"> 
											 <b class="bg-info"></b> </i> 
											 <span class="pull-right"> 
												<i class="fa fa-angle-down text"></i> 
												<i class="fa fa-angle-up text-active"></i> 
											 </span> 
											 <span>COURSES</span> 
										 </a> 
										 <ul class="nav lt"> 
											<li class=""> 
												<a href="<?php echo e(route('courses')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Toutes les courses</span> </a> 
											</li> 
											<!--li class=""> 
												<a href="<?php echo e(route('courses')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Courses livrées</span> </a> 
											</li> 
											<li class=""> 
												<a href="<?php echo e(route('courses')); ?>" class="active"> 
												<i class="fa fa-angle-right"></i> 
												<span>Courses non livrées</span> </a> 
											</li-->
										 </ul> 
									</li>

									<?php else: ?>
									<li> 
										<a href="<?php echo e(route('login')); ?>" class="active"> 
											<i class="fa fa-columns icon"> 
											<b class="bg-info"></b> </i>
											<span>Se connecter</span> 
										</a> 
									</li>
									<?php endif; ?>
									
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
							
							<?php echo $__env->yieldContent('content'); ?>
							
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
	 <script src="<?php echo e(asset('js/app.v1.js')); ?>"></script> 
	 <script src="<?php echo e(asset('js/datatables/jquery.dataTables.min.js')); ?>"></script>
	 <script src="<?php echo e(asset('js/datatables/jquery.csv-0.71.min.js')); ?>"></script>
	 <script src="<?php echo e(asset('js/kraksoft.js')); ?>"></script> 
	 <script src="<?php echo e(asset('js/pubnub.js')); ?>"></script> 
	 <script src="<?php echo e(asset('js/app.plugin.js')); ?>"></script> 
	 
	 <!-- fuelux -->
	 <script src="<?php echo e(asset('js/fuelux/fuelux.js')); ?>"></script>
	 <script src="<?php echo e(asset('js/parsley/parsley.min.js')); ?>"></script>
	 
	 
	 <script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>
	 <script src="<?php echo e(asset('js/select2.js')); ?>"></script>
	 
	 <script src="<?php echo e(asset('js/todo_drag.js')); ?>"></script>
	 
	<script src="<?php echo e(asset('js/jquery-ui-1.10.3.custom.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.krakPopup.js')); ?>"></script>
	 
	<script src="<?php echo e(asset('js/noty/jquery.noty.js')); ?>"></script>
	<script src="<?php echo e(asset('js/noty/layouts/bottomCenter.js')); ?>"></script>
	<script src="<?php echo e(asset('js/noty/layouts/topRight.js')); ?>"></script>
	<script src="<?php echo e(asset('js/noty/layouts/top.js')); ?>"></script>
	<script src="<?php echo e(asset('js/noty/layouts/center.js')); ?>"></script>
	<script src="<?php echo e(asset('js/noty/themes/default.js')); ?>"></script>
	
	<script src="<?php echo e(asset('js/contextual.js')); ?>"></script>

	
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	
	<input type="hidden" id="eco_base_url" value="<?php echo e('http://'.$_SERVER['HTTP_HOST']); ?>/">
 
 </body>
</html>