@extends('spa.template')


@section('init-css')
		<link rel="stylesheet" href="{{url('assets/unify/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css')}}">
		<link rel="stylesheet" href="{{url('assets/unify/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css')}}">
@endsection


@section('page-style')
	<!-- CSS Page Style -->
	<link rel="stylesheet" href="{{url('assets/unify/css/pages/page_search.css')}}">
@endsection


@section('content')
			<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">SERVIÇOS {{$servico}}</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">Ínicio</a></li>
					<li class="active">Serviços</li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->



		<!--=== Cube Portfolio ===-->
		<div class="container content-sm">
			<div class="cube-portfolio container margin-bottom-20">	
				<div id="grid-container" class="cbp-l-grid-gallery">
					<div class="cbp-item illustration web-design ">
						<a href="{{url('assets/unify/ajax/cube-portfolio/project1.html')}}" id="spa-day-woman" class="cbp-caption cbp-singlePageInline"
							data-title="World Clock Widget<br>by Paul Flavius Nechita">
							<div class="cbp-caption-defaultWrap">
								<img src="{{url('assets/unify/img/meumomento-coming-soon/servico1.jpg')}}" alt="">
							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignLeft">
									<div class="cbp-l-caption-body">
										<div class="cbp-l-caption-title">SPA DAY WOMAN</div>
										<!--<div class="cbp-l-caption-desc">Development</div>-->
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="cbp-item web-design logo">
						<a href="{{url('assets/unify/ajax/cube-portfolio/project2.html')}}" id="spa-day-men" class="cbp-caption cbp-singlePageInline"
							data-title="Bolt UI<br>by Tiberiu Neamu">
							<div class="cbp-caption-defaultWrap">
								<img src="{{url('assets/unify/img/meumomento-coming-soon/servico6.jpg')}}" alt="">
							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignLeft">
									<div class="cbp-l-caption-body">
										<div class="cbp-l-caption-title">SPA DAY MEN</div>
										<div class="cbp-l-caption-desc"></div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="cbp-item illustration web-design">
						<a href="{{url('assets/unify/ajax/cube-portfolio/project3.html')}}" id="dia-da-noiva" class="cbp-caption cbp-singlePageInline"
							data-title="WhereTO App<br>by Tiberiu Neamu">
							<div class="cbp-caption-defaultWrap">
								<img src="{{url('assets/unify/img/meumomento-coming-soon/servico2.jpg')}}" alt="">
							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignLeft">
									<div class="cbp-l-caption-body">
										<div class="cbp-l-caption-title">DIA DA NOIVA</div>
										<div class="cbp-l-caption-desc"></div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="cbp-item web-design illustration">
						<a href="{{url('assets/unify/ajax/cube-portfolio/project4.html')}}" id="pec" class="cbp-caption cbp-singlePageInline"
							data-title="iDevices<br>by Tiberiu Neamu">
							<div class="cbp-caption-defaultWrap">
								<img src="{{url('assets/unify/img/meumomento-coming-soon/pec.jpg')}}" alt="">
							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignLeft">
									<div class="cbp-l-caption-body">
										<div class="cbp-l-caption-title">PEC - PROGRAMA DE EMAGRECIMENTO CONTROLADO</div>
										<div class="cbp-l-caption-desc"></div>
									</div>
								</div>
							</div>
						</a>
					</div>
					
				</div><!--/end Grid Container-->
			</div>
		</div>
		<!--=== End Cube Portfolio ===-->

		
@endsection


@section('implementing-plugins')
	<script type="text/javascript" src="{{url('assets/unify/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js')}}"></script>
	<script type="text/javascript">
			var servico = "{{ $servico }}";
			console.log(servico);
	 </script>
@endsection

@section('scripts')
<!-- JS Page Level -->
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/cube-portfolio/cube-portfolio-lightbox.js')}}"></script>
@endsection


@section('init-js')
		
@endsection