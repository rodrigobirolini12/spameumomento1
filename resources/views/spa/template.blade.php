<head>


	<title>SPA Meu Momento</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="{{url('assets/unify/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/css/style.css')}}">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="{{url('assets/unify/css/headers/header-v5.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/css/footers/footer-v6.css')}}">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="{{url('assets/unify/plugins/animate.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/line-icons/line-icons.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/fancybox/source/jquery.fancybox.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/owl-carousel/owl-carousel/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/master-slider/masterslider/style/masterslider.css')}}">
	<link rel='stylesheet' href="{{url('assets/unify/plugins/master-slider/masterslider/skins/black-2/style.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/revolution-slider/rs-plugin/css/settings.css')}}" type="text/css" media="screen">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Antic+Didone" rel="stylesheet">
	@yield('init-css')
	<!-- CSS Pages Style -->
	<link rel="stylesheet" href="{{url('assets/unify/css/pages/page_one.css')}}">
	<!-- CSS Page Style -->
	<link rel="stylesheet" href="{{url('assets/unify/css/pages/page_contact.css')}}">
	@yield('page-style')
	
	
	<!-- CSS Theme -->
	<link rel="stylesheet" href="{{url('assets/unify/css/theme-colors/teal.css')}}" id="style_color">
	<link rel="stylesheet" href="{{url('assets/unify/css/theme-skins/dark.css')}}">


	<!-- CSS Customization -->
	<link rel="stylesheet" href="{{url('assets/unify/css/custom.css')}}">
		<!-- CSS Theme -->
  <link rel="stylesheet" href="{{url('assets/unify/css/spa.style.css')}}">
	<style>

    
	.header-fixed .header-v5.header-fixed-shrink .navbar-nav > li > a {
    
    margin-top: -36px;
    
}
		 .header-fixed .header-v5.header-fixed-shrink .navbar-brand img {
    width: 50%;
    height: 44px !important;
}
	.btn-u {
    
    font-size: 16px;
    
}

.testimonials-v3 .owl-buttons .owl-prev, .testimonials-v3 .owl-buttons .owl-next {
   
    background: #999;

}
.header-fixed .header-v5.header-fixed-shrink {
   
    height: 95px !important;
  
}
		.footer-v6 .footer .contacts li i {
    float: left;
    width: 30px;
    height: 30px;
    color: #777;
    padding: 8px 5px;
    background: #333;
    text-align: center;
    margin: -3px 10px 0 0;
    display: inline-block;
}
		h2{
			color:#18ba9b !important;
		}
		h3{
			color:#18ba9b !important;
		}

		.desc-tratamentos{
			color:#18ba9b !important;
			text-align: center;
			text-transform: uppercase;;	
		}
		.featured-blog h2:after {
		    
		    width: 30px;
		    margin-left: 159px;
		    background: white;
		}
		.content-md-depoimento {
		    padding-top: 28px;
		    padding-bottom: 80px;
		}
		body.header-fixed-space {
    		padding-top: 0px;

		}
		.topbar-v3 {
		    z-index: 99;
		    padding: 8px 0;
		    position: relative;
		    background: #18ba9b;
			}		
			
		
			@yield('style')
	</style>		
</head>

<body class="header-fixed header-fixed-space">
	<div class="wrapper">
		<!--=== Header v5 ===-->
		<div class="header-v5 header-sticky" style="height: 161px;">
			<!-- Topbar v3 -->
			<div class="topbar-v3">
				<div class="search-open">
					<div class="container">
						<input type="text" class="form-control" placeholder="Search">
						<div class="search-close"><i class="icon-close"></i></div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-sm-5">
							<!-- Topbar Navigation -->
							<ul class="left-topbar">
								<li>
									<a style="text-transform:none"><i class="search fa fa-envelope search-button"></i> spameumomento@hotmail.com</a>
									
									
								</li>
								
							</ul><!--/end left-topbar-->
						</div>
						<div class="col-sm-7">
							<ul class="list-inline right-topbar pull-right">
								<li><i class="search fa fa-phone search-button"></i> <a href="#">(31) 2565.9159</a></li>
								<li><i class="search fa fa-whatsapp search-button"></i> <a href="#">(31) 9950.9159</a></li>
								<li><i class="search fa fa-home search-button"></i> <a href="#">Contagem - MG</a></li>
								
								
								
							</ul>
						</div>
					</div>
				</div><!--/container-->
			</div>
			<!-- End Topbar v3 -->

			<!-- Navbar -->
			<div class="navbar navbar-default mega-menu" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{url('mapa/inicio')}}">
							<img id="logo-header " style="widht:150px;height:95px;" src="{{url('assets/unify/img/meumomento-coming-soon/logo.png')}}" alt="Logo">
						</a> 
					</div>

				
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<!-- Nav Menu -->
						<ul class="nav navbar-nav" style="margin-top:41px">
							<!-- Pages -->
							<li class="dropdown active">
								<a href="{{url('mapa/inicio')}}">
									HOME
								</a>
							</li>
							<!-- End Pages -->

							<!-- Promotion -->
							<li class="dropdown">
								<a href="{{url('mapa/clinica')}}">
									A Clinica
								</a>
								
							</li>
							<!-- End Promotion -->

							<!-- Clothes -->
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-delay="1000">
									serviços
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">SPA DAY WOMAN</a></li>
									<li><a href="#">SPA DAY MEN</a></li>
									<li><a href="#">DIA DA NOIVA</a></li>
									<li><a href="#">PEC - EMAGRECIMENTO CONTROLADO</a></li>
									<li><a href="#">SALÃO DE BELEZA</a></li>
								</ul>
							</li>
							<!-- End Clothes -->
							<!-- Books -->
							<li class="dropdown mega-menu-fullwidth">
								<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
									Tratamentos
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="container">
												<div class="row">
													

													
													<div class="col-md-4 col-sm-6">
														<h3 class="mega-menu-heading">CORPORAIS</h3>
														<ul class="list-unstyled style-list">
															<li><a href="#">Avatar</a></li>
															<li><a href="#">Bambuterapia</a> </li>
															<li><a href="#">Banho de lua</a></li>
															<li><a href="#">Carboxiterapia</a></li>
															<li><a href="#">Cavitação</a></li>
															<li><a href="#">Criolopólise</a><span class="label label-danger-shop">Novo</span></li>
															<li><a href="#">Depilação a laser</a></li>
															<li><a href="#">Drenagen Linfática</a></li>
															<li><a href="#">Esfoliação e hidratação corporal</a></li>
															<li><a href="#">Lipo enzimática</a></li>
															<li><a href="#">Luz Pulsada</a></li>
															<li><a href="#">Manthus</a></li>
															<li><a href="#">Massagem relaxante</a></li>
															<li><a href="#">Photon dome</a></li>
															<li><a href="#">Plataforma vibratória</a></li>
															<li><a href="#">Radiofrequência</a></li>
															<li><a href="#">Termoterapia pedras quentes</a></li>
															<li><a href="#">Vibrocell</a></li>
														</ul>
													</div>

													<div class="col-md-4 col-sm-6">
														<h3 class="mega-menu-heading">FACIAIS</h3>
														<ul class="list-unstyled style-list">
															<li><a href="#">Limpeza de pele profunda</a></li>
															<li><a href="#">Microagulhamento/Dermoroller</a></li>
															<li><a href="#">Peeling de Cristal</a></li>
															<li><a href="#">Peeling Diamante</a></li>
															<li><a href="#">Peeling Químico</a></li>
															<li><a href="#">Skirts</a></li>
															<li><a href="#">Botox</a></li>
															<li><a href="#">Bioplastia</a></li>
															<li><a href="#">Radiofrequência</a></li>
															<li><a href="#">Carboxiterapia</a></li>
															<li><a href="#">Luz Pulsada</a></li>
														
														</ul>
													</div>
													<div class="col-md-4 col-sm-6">
														<h3 class="mega-menu-heading">Funcional / Aeróbico</h3>
														<ul class="list-unstyled style-list">
															<li><a href="#">Funcional</a></li>
															<li><a href="#">Aeróbico</a></li>
														</ul>
													</div>
												</div><!--/end row-->
											
										</div><!--/end mega menu content-->
									</li>
								</ul><!--/end dropdown-menu-->
							</li>
							<!-- End Books -->

							<!-- Clothes -->
							<li class="dropdown">
								<a href="{{url('mapa/galeria')}}">
									o salão
								</a>
							</li>
							<!-- End Clothes -->
							<!-- Main Demo -->
							<li><a href="../index.html">Promoções</a></li>
							<li class="dropdown">
								<a href="{{url('mapa/contato')}}" >
									Contato
								</a>
								
							</li>
							<!-- Main Demo -->
						</ul>
						<!-- End Nav Menu -->
					</div>
				</div>
			</div>
			<!-- End Navbar -->
		</div>
		<!--=== End Header v5 ===-->
		
		
		
		@yield('content')
		
		
		
		
		
		
		
		
		
		
			<!--=== Footer v6 ===-->
		<div id="footer-v6" class="footer-v6">
			<div class="footer">
				<div class="container">
					<div class="row">
						<!-- About -->
						<div class="col-md-3 md-margin-bottom-40">
							<div class="heading-footer"><h2>NEWSLETTER</h2></div>
							<p class="margin-bottom-20">Cadastre e receba todas nossas promoções e novidades.</p>

							<form class="footer-subscribe">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Seu email">
									<span class="input-group-btn">
										<button class="btn-u" type="button">OK!</button>
									</span>
								</div>
							</form>
						</div>
						<!-- End About -->

						<!-- Useful Links -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>SERVIÇOS</h2></div>
							<ul class="list-unstyled footer-link-list">
								<li style="text-align:left;"><a href="#">SPA DAY MEN</a></li>
								<li style="text-align:left;"><a href="#">SPA DAY WOMAN</a></li>
								<li style="text-align:left;"><a href="#">DIA DA NOIVA</a></li>
								<li style="text-align:left;"><a href="#">PEC - PROGRAMA DE EMAGRACIMENTO CONTROLADO</a></li>
								<li style="text-align:left;"><a href="#">SALÃO DE BELEZA</a></li>
							</ul>
						</div>
						<!-- End Useful Links -->

						<!-- Useful Links -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>TRATAMENTOS</h2></div>
							<ul class="list-unstyled footer-link-list">
								<li style="text-align:left;"><a href="#">Corporais</a></li>
								<li style="text-align:left;"><a href="#">Faciais</a></li>
								<li style="text-align:left;"><a href="#">Aérobicos</a></li>
								<li style="text-align:left;"><a href="#">Funcionais</a></li>
							</ul>
						</div>
						<!-- End Useful Links -->

						<!-- Contacts -->
						<div class="col-md-3">
							<div class="heading-footer"><h2>Contatos</h2></div>
							<ul class="list-unstyled contacts">
								<li>
									<i class="radius-3x fa fa-map-marker"></i>
									Av Rio negro 745 riacho,
									CONTAGEM, MG
								</li>
								<li>
									<i class="radius-3x fa fa-phone"></i>
									(31) 2565.9159<br>
									(31) 9950.9159
								</li>
								<li>
									<i class="radius-3x fa fa-globe"></i>
									<a href="#">spameumomento@hotmail.com</a><br>
								</li>

							</ul>

						</div>
						<!-- End Contacts -->
					</div>
				</div><!--/container -->
			</div>

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-8 sm-margon-bottom-10">
							<ul class="list-inline terms-menu">
								<li class="silver">Copyright © 2017 - Todos os direitos reservados</li>
							
							</ul>
						</div>
						<div class="col-md-4">
							<ul class="list-inline dark-social pull-right space-bottom-0">
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="https://www.facebook.com/spameumomento.spa?fref=ts" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Vine" href="#">
										<i class="fa fa-vine"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Google plus" href="#">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Pinterest" href="#">
										<i class="fa fa-pinterest"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Instagram" href="#">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Tumblr" href="#">
										<i class="fa fa-tumblr"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Youtube" href="#">
										<i class="fa fa-youtube"></i>
									</a>
								</li>
								<li>
									<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Soundcloud" href="#">
										<i class="fa fa-soundcloud"></i>
									</a>
								</li> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== End Footer v6 ===-->
	</div><!--/wrapper-->

	
	<!--=== End Style Switcher ===-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="{{url('assets/unify/plugins/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="{{url('assets/unify/plugins/back-to-top.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/smoothScroll.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/jquery.parallax.js')}}"></script>
	<script src="{{url('assets/unify/plugins/master-slider/masterslider/masterslider.min.js')}}"></script>
	<script src="{{url('assets/unify/plugins/master-slider/masterslider/jquery.easing.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/counter/waypoints.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/counter/jquery.counterup.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	@yield('implementing-plugins')
	<!-- JS Customization -->
	<script type="text/javascript" src="{{url('assets/unify//js/custom.js')}}"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="{{url('assets/unify/js/app.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/fancy-box.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/owl-carousel.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/master-slider-fw.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/style-switcher.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/revolution-slider.js')}}"></script>
	@yield('scripts')
	
	
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initCounter();
			App.initParallaxBg();
			FancyBox.initFancybox();
			MSfullWidth.initMSfullWidth();
			OwlCarousel.initOwlCarousel();
			StyleSwitcher.initStyleSwitcher();
			RevolutionSlider.initRSfullWidth();
			@yield('init-js')
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>
		