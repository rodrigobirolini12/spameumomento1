@extends('spa.template')


@section('style')

		
		h2{
			color:#18ba9b !important;
		}
		h3{
			color:#18ba9b !important;
			text-align:center !important;
		}

		.textoInicial{
			text-align: justify;
			text-indent:34px;
		}
	
		.service-block-v8 .service-block-desc h3:after {
            left: 191px;
            top: 40px;
            height: 1px;
            width: 100px;
            content: " ";
            position: absolute;
            background: #18ba9b;
        }
@endsection

@section('content')
				<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">A Clínica</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">Ínicio</a></li>
					<li class="active">Clínica</li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->

							<!-- About Section -->
		<div class="container content-md">
			
			<div class="row">
				<div class="col-md-6 md-margin-bottom-30">
					<h2 class="title-v2">Um pouco de história</h2>
					<p class="textoInicial">O SPA Meu Momento iniciou as atividades em 2003, em sua primeira sede localizada no Lago Sul, com a ideia de unir estética e nutrição a tecnologia e qualidade, baseadas nas necessidades de cada paciente. Esse método tem o objetivo de provar às pessoas que não existe melhores sensações na vida do que autoestima elevada e bem-estar</p>
					<p class="textoInicial">Na Aérea de Estética Facial existem serviços adequados para cada problema: suavizar as linhas de expressões, hidratar e diminuir a oleosidade da pele, diminuir manchas, tratamento de acne, entre outros.</p>
					<p class="textoInicial">Cristina Fernandes uma empreendedora de visão viu uma oportunidade no segmento de beleza que hoje se encontra em
					constante crescimento.</p>
					<p class="textoInicial">Na Área de Estética Corporal oferecemos tratamentos de redução de medidas, combate a celulite e gordura localizada, tonificação muscular, entre outros através de técnicas manuais e também equipamentos modernos. Você que quer manter o corpo em forma e com saúde pode procurar por nossos serviços!</p>
					<p></p>
				
				</div>
				<div class="col-md-6">
					<!-- Magazine Slider -->
					<div class="carousel slide carousel-v2" id="portfolio-carousel">
						<ol class="carousel-indicators">
							<li class="active rounded-x" data-target="#portfolio-carousel" data-slide-to="0"></li>
							<li class="rounded-x" data-target="#portfolio-carousel" data-slide-to="1"></li>
							<li class="rounded-x" data-target="#portfolio-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img class="full-width img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/frente-spa.png')}}" alt="">
							</div>
							<div class="item">
								<img class="full-width img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/cristina_fernandes.jpg')}}" alt="">
							</div>
							<div class="item">
								<img class="full-width img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_pedras.jpg')}}" alt="">
							</div>
						</div>

						<a class="left carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="prev">
							<i class="fa fa-angle-left arrow-prev" style="margin-top:9px"></i>
						</a>
						<a class="right carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="next">
							<i class="fa fa-angle-right arrow-next" style="margin-top:9px"></i>
						</a>
					</div>
					<!-- End Magazine Slider -->
				</div>
			</div>
		</div>
		<!-- End About Section -->

		<!--=== Service Block ===-->
		<div class="bg-color-light">
			<div class="container content-sm">
				<div class="headline-center margin-bottom-60">
					<h2>O QUE OFERECEMOS?</h2>
				</div>

				<!-- Service Block v8 -->
				<div class="row margin-bottom-30">
					<div class="col-sm-6 sm-margin-bottom-50">
						<div class="service-block-v8">
							
							<div class="service-block-desc">
								<h3>Tratamentos Corporais</h3>
								<p>Os tratamentos Corporais Estéticos têm como objetivo dar uma melhor definição aos contornos do corpo por meio de redução de medidas, combate à celulite, flacidez, gordura localizada, tratamentos pré e pós-operatórios e outros transtornos que comprometem a silhueta.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 sm-margin-bottom-20">
						<div class="service-block-v8">
							
							<div class="service-block-desc">
								<h3>Tratamento para emagrecimento</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam luctus velit nec ante tempor, iaculis mollis ante imperdiet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- End Service Block v8 -->

				<!-- Service Block v8 -->
				<div class="row margin-bottom-30">
					<div class="col-sm-6 sm-margin-bottom-50">
						<div class="service-block-v8">
							
							<div class="service-block-desc">
								<h3>Tratamento Facial</h3>
								<p>Fazemos limpeza de pele, com mascarás vitamina C, rejuvenescimento, clareamento, liffiting, pele menopausadas e outros</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 sm-margin-bottom-20">
						<div class="service-block-v8">
						
							<div class="service-block-desc">
								<h3>Pacotes personalizados</h3>
								<p>Dia da noiva, SPA Day e muito maiss</p>
							</div>
						</div>
					</div>
				</div>
				<!-- End Service Block v8 -->

				<!-- Service Block v8 -->
				<div class="row margin-bottom-20">
					<div class="col-sm-6 sm-margin-bottom-50">
						<div class="service-block-v8">
							
							<div class="service-block-desc">
								<h3>Espaço fitness</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam luctus velit nec ante tempor, iaculis mollis ante imperdiet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					
				</div>
				<!-- End Service Block v8 -->
			</div>
		</div>
		<!--=== End Service Block ===-->

	

		<!-- Parallax Quote -->
		<div class="parallax-quote parallax-quote-light parallaxBg">
			<div class="container">
				<div class="parallax-quote-in rounded">
					<p>Se <span class="color-green">permita</span> se <span class="color-green">curta</span> <br> é tempo de ser mais.</p>
					<small>- SPA MEU MOMENTO -</small>
				</div>
			</div>
		</div>
		<!-- End Parallax Quote -->

		<!--=== Service Block ===-->
		<div class="bg-color-light">
			<div class="container content-sm no-bottom-space">
				<div class="row margin-bottom-60">
					<div class="col-md-4 md-margin-bottom-50">
						<div class="service-block-v7">
							<i class="icon-diamond"></i>
							<h3 class="title-v3-bg text-uppercase">Missão</h3>
							<p>Proporcionar saúde, bem estar físico e mental, através de técnicas e conhecimento, atuando com ética, eficiência e qualidade.</p>
						</div>
					</div>
					<div class="col-md-4 md-margin-bottom-50">
						<div class="service-block-v7">
							<i class="icon-layers"></i>
							<h3 class="title-v3-bg text-uppercase">Visão</h3>
							<p > Tornar-se referencial de excelência em Estética, por meio do contínuo aprimoramento tecnológico e científico de nosso Instituto e de nossa equipe.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="service-block-v7">
							<i class="icon-rocket"></i>
							<h3 class="title-v3-bg text-uppercase">Valores</h3>
							<p>Ética, responsabilidade, qualidade, transparência e eficiência.</p>
						</div>
					</div>
				</div>
			</div><!--/container-->
		</div>
		<!--=== End Service Block ===-->
<!--=== Owl Clients v1 ===-->
		<div class="container content-sm">
			
		</div>
		<!--=== End Owl Clients v1 ===-->
@endsection