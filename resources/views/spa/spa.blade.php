<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Spa Meu Momento - Time</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico"> 

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>


	<!-- CSS Global Compulsory-->
	<link rel="stylesheet" href="{{url('assets/unify/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/css/style.css')}}">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="{{url('assets/unify/plugins/animate.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/line-icons/line-icons.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/font-awesome/css/font-awesome.css')}}">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="{{url('assets/unify/css/pages/page_coming_soon.css')}}">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="{{url('assets/unify/css/theme-colors/default.css')}}" id="style_color">
</head>

<body class="coming-soon-page">
	<div class="coming-soon-border"></div>
	<div class="coming-soon-bg-cover"></div>

	<!--=== Content Part ===-->
	<div class="container cooming-soon-content valign__middle">
		<!-- Coming Soon Content -->
		<div class="row">
			<div class="col-md-12 coming-soon">
				<h1 >Em Breve...</h1>
				<h1 style="color:#a7e8c2; ">SPA Meu Momento</h1>
				<p style="font-size:20px">Se permita, se curta é tempo de ser mais...</p><br>


				<!--<form>
					<div class="input-group col-md-4 col-md-offset-4">
						<input type="text" class="form-control" placeholder="Your Email">
						<span class="input-group-btn">
							<button class="btn-u" type="button">Inscreva-se</button>
						</span>
					</div><!-- /input-group 
				</form>-->
			</div>
		</div>

		<!-- Coming Soon Plugn -->
		<div class="coming-soon-plugin" style="height: 200px;">
			<div id="defaultCountdown"></div>
		</div>
	</div><!--/container-->
	<!--=== End Content Part ===-->

	<!--=== Sticky Footer ===-->

	<div class="sticky-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-left">
					<p class="color-light">
						2016 &copy; Spa Meu Momento. Todos os direitos re.
					</p>
				</div>
				<div class="col-sm-6 text-right">
					<a href="https://www.facebook.com/SpaMeuMomento.site/?fref=ts" target="_blank"><i class="fa fa-facebook" style="font-size:52px;color:white" id="icon-facebook"></i></a>
					</div>
			</div>
		</div>
	</div>
	
	<!--=== End Sticky-Footer ===-->


	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="{{url('assets/unify/plugins/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="{{url('assets/unify/plugins/back-to-top.js')}}"></script>
	
	<script type="text/javascript" src="{{url('assets/unify/plugins/smoothScroll.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/countdown/jquery.plugin.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/countdown/jquery.countdown.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/countdown/jquery.countdown-pt-BR.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/backstretch/jquery.backstretch.min.js')}}"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="{{url('assets/unify/js/custom.js')}}"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="{{url('assets/unify/js/app.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/pages/page_coming_soon.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			PageComingSoon.initPageComingSoon();

			$('#icon-facebook').hover(function() {
			    $(this).css("color", "#337ab7");
			}, function() {
			    $(this).css("color", "white");
			});
		});
	</script>

	<!-- Background Slider (Backstretch) -->
	<script>
		$.backstretch([
			"{{url('assets/unify/img/meumomento-coming-soon/44.jpg')}}",
			"{{url('assets/unify/img/meumomento-coming-soon/imagem1.jpg')}}",
			"{{url('assets/unify/img/meumomento-coming-soon/imagem4.jpg')}}",
			"{{url('assets/unify/img/meumomento-coming-soon/imagem6.jpg')}}",
			"{{url('assets/unify/img/meumomento-coming-soon/frente-spa.png')}}",
			
			], {
				fade: 1000,
				duration: 7000
			});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>
