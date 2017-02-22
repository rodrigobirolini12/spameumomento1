@extends('spa.template')


@section('content')
		<!--=== Slider ===-->
		<div class="tp-banner-container">
			<div class="tp-banner">
				<ul>


		
					<!-- SLIDE -->
					<li  data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Title 1">
						<!-- MAIN IMAGE -->
						<img src="{{url('assets/unify/img/meumomento-coming-soon/criolipolise.jpg')}}"     data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch1 sft start"
						data-x="center"
						data-hoffset="0"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
					
						</div>

					
					</li>
					<!-- END SLIDE -->
					<!-- SLIDE -->
					<li  data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Title 1">
						<!-- MAIN IMAGE -->
						<img src="{{url('assets/unify/img/meumomento-coming-soon/toninha.jpg')}}"     data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch1 sft start"
						data-x="center"
						data-hoffset="0"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
					
						</div>

					
					</li>
					<!-- END SLIDE -->
					<!-- SLIDE -->
					<li  data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Title 1">
						<!-- MAIN IMAGE -->
						<img src="{{url('assets/unify/img/meumomento-coming-soon/toninha2.jpg')}}"     data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch1 sft start"
						data-x="center"
						data-hoffset="0"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
					
						</div>

					
					</li>
					<!-- END SLIDE -->

				</ul>
				<div class="tp-bannertimer tp-bottom"></div>
			</div>
		</div>
		<!--=== End Slider ===-->

		<!--=== Call To Action ===-->
		<div class="call-action-v1 bg-color-light">
			<div class="container">
				<div class="call-action-v1-box">
					<div class="call-action-v1-in">
						<p style="line-height:58px"><span class="dropcap dropcap-bg bg-color-teal">O</span>ferecemos procedimentos de estética, rejuvenescimento, emagrecimento e beleza.</p>
					</div>
					<div class="call-action-v1-in inner-btn page-scroll">
						<a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-block">AVALIAÇÃO GRATUITA</a>
					</div>
				</div>
			</div>
		</div>
		<!--=== End Call To Action ===-->
		<br>
		<!--begin  divider serviços -->


			<div class="col-md-12">
			<div class="headline-center margin-bottom-60">
				<h2 >NOSSOS SERVIÇOS</h2>
				<p class="space-lg-hor">Venha conhecer nossos serviços exclusivos como o <span class="color-green">SPA DAY</span> e o <span class="color-green">DIA DA NOIVA</span> além dos nossos pacotes personalizados que são elaborados por nossa equipe para atender suas necessidades de beleza, bem-estar e relaxamento.</p>
			</div>
				

				<!-- Procedures Section -->
	<section id="procedures">
		<div class="container-fluid no-padding">
			<div class="procedures">
				<!-- First procedure -->
				<div class="row equal-height-columns">
					<div class="col-md-6 no-padding">
						<div class="care-text-wrapper">
							<div class="care-text equal-height-column">
								<h3 class="care-h3">SPA DAY WOMAN</h3>
								<p class="care-p">Para mulheres que buscam momentos de relaxamento e de cuidados com a beleza.</p>
								<form  action="servicos" method="POST">
									<input type="hidden" name="servico" value="spa-day-woman">
									<button type="submit" class="btn-u btn-u-lg btn-u-default btn-u-upper" >Saiba mais</button>
								</form>
								
							</div>
						</div>
					</div>

					<div class="col-md-6 no-padding">
						<div class="care-img equal-height-column">
							<img src="{{url('assets/unify/img/meumomento-coming-soon/servico1.jpg')}}" alt="">
						</div>
					</div>
				</div>

				<!-- Second procedure -->
				<div class="row equal-height-columns">
					<div class="col-md-6 no-padding">
						<div class="care-img equal-height-column">
							<img src="{{url('assets/unify/img/meumomento-coming-soon/servico6.jpg')}}" alt="">
						</div>
					</div>

					<div class="col-md-6 no-padding">
						<div class="care-text-wrapper">
							<div class="care-text equal-height-column">
								<h3 class="care-h3">SPA DAY MAN</h3>
								<p class="care-p">Para homens que querem fugir do stress e da rotina diária e se dedicar ao relaxamento e qualidade de vida.</p>
								<form  action="servicos" method="POST">
									<input type="hidden" name="servico" value="spa-day-men">
									<button type="submit" class="btn-u btn-u-lg btn-u-default btn-u-upper" >Saiba mais</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- Third procedure -->
				<div class="row equal-height-columns">
					<div class="col-md-6 no-padding">
						<div class="care-text-wrapper">
							<div class="care-text equal-height-column">
								<h3 class="care-h3">DIA DA NOIVA</h3>
								<p class="care-p">
									Serviço exclusivo para tornar o seu dia especial ainda mais inesquecível!
								</p>
								<form  action="servicos" method="POST">
									<input type="hidden" name="servico" value="dia-da-noiva">
									<button type="submit" class="btn-u btn-u-lg btn-u-default btn-u-upper" >Saiba mais</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-6 no-padding">
						<div class="care-img equal-height-column">
							<img src="{{url('assets/unify/img/meumomento-coming-soon/servico2.jpg')}}" alt="">
						</div>
					</div>
				</div>

				<!-- Fourth procedure -->
				<div class="row equal-height-columns">
					<div class="col-md-6 no-padding">
						<div class="care-img equal-height-column">
							<img src="{{url('assets/unify/img/meumomento-coming-soon/pec.jpg')}}" alt="">
						</div>
					</div>

					<div class="col-md-6 no-padding">
						<div class="care-text-wrapper">
							<div class="care-text equal-height-column">
								<h3 class="care-h3">PEC - PROGRAMA DE EMAGRACIMENTO CONTROLADO</h3>
								<p class="care-p">Um programa personalizado para você alcançar sua meta de peso ideal.</p>
								<form  action="servicos" method="POST">
									<input type="hidden" name="servico" value="pec">
									<button type="submit" class="btn-u btn-u-lg btn-u-default btn-u-upper" >Saiba mais</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End of Procedures Section -->

			</div>
			<!-- end divider serviços -->	
				<!--
				<div class="col-md-12">
				<br><br><br>
			<div class="headline-center margin-bottom-60">
				<h2 >Tratamentos</h2>
			</div>
			</div>
			<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_bambuterapia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">BAMBUTERAPIA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_bambuterapia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">TERMOTERAPIA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_drenagem-linfatica.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">DRENAGEM LINFÁTICA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
							<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_1carboxiterapia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">CARBOXITERAPIA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_bambuterapia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">PHOTO DOME</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_1fitness.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">FITNESS</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_cavitacao.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">CAVITAÇÃO</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_mantus.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">MANTHUS</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_vibrocel.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">VIBROCEL</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_bambuterapia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">AVATAR</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_depilacao-laser.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">DEPILAÇÃO SOPRANO</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_radiofrequencia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">RADIO FREQUÊNCIA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_bioplastia.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">BIOPLASTIA</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
								<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive"  src="{{url('assets/unify/img/meumomento-coming-soon/rsz_botox.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">BOTOX</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
							<div class="col-md-3">
							<div class="thumbnails thumbnail-style thumbnail-kenburn">
								<div class="thumbnail-img">
									<div class="overflow-hidden">
										<img class="img-responsive" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_peeling.jpg')}}" alt="" />
									</div>
									<a class="btn-more hover-effect" href="#">read more +</a>
								</div>
								<div class="caption">
									<h3><a class="hover-effect" href="#">PEELING</a></h3>
									<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
								</div>
							</div>
							</div>
							-->

			<div class="col-md-12">
			<br><br>
			   <div class="headline-center">
			      <h2 >TRATAMENTOS</h2>
			      <p class="space-lg-hor">Tecnologia de ponta. Os melhores profissionais. As mais avançadas soluções.<span class="color-green"></p>
			   </div>
			   	<!--=== Featured Blog ===-->
		<div class="container content-sm">
			<div class="row featured-blog">
				<div class="col-sm-4 " style="margin-top:-45px">
					<div class="featured-img">
						<img class="img-responsive margin-bottom-20" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_tratamento-corporal.jpg')}}" alt="">
						<a href="#"><i class="rounded-x fa fa-link"></i></a>
					</div>
					<h2 class="desc-tratamentos"><a class="color-dark" href="#">Corporais</a></h2>
					
				</div>
				<div class="col-sm-4" style="margin-top:-45px">
					<div class="featured-img">
						<img class="img-responsive margin-bottom-20" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_tratamento-facial1.jpg')}}" alt="">
						<a href="#"><i class="rounded-x fa fa-link"></i></a>
					</div>
					<h2 class="desc-tratamentos"><a class="color-dark" href="#">Faciais</a></h2>
					
				</div>
				<div class="col-sm-4" style="margin-top:-45px">
					<div class="featured-img">
						<img class="img-responsive margin-bottom-20" src="{{url('assets/unify/img/meumomento-coming-soon/rsz_1emagrecimento.jpg')}}" alt="">
						<a href="#"><i class="rounded-x fa fa-link"></i></a>
					</div>
					<h2  class="desc-tratamentos"><a class="color-dark" href="#">Emagrecimento</a></h2>
									</div>
			</div><!--/end row-->
		</div>
		</div>
		<!--=== End Featured Blog ===-->


			<hr>
		
	
			<div class="container content-sm">
			<div class="headline-center margin-bottom-60">
				<h2 style="margin-top:-130px;margin-bottom:-29px">DIFERENCIAIS</h2>
			</div>
			<div class="row">
				<div class="col-sm-6 content-boxes-v3">
					<div class="clearfix margin-bottom-30">
						<i class="icon-custom icon-md rounded-x icon-bg-u icon-line icon-call-in"></i>
						<div class="content-boxes-in-v3">
							<h2 class="heading-sm">Atendimento Personalizado</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						</div>
					</div>
					<div class="clearfix margin-bottom-30">
						<i class="icon-custom icon-md rounded-x icon-bg-u icon-line  fa fa-laptop"></i>
						<div class="content-boxes-in-v3">
							<h2 class="heading-sm">Alta Tecnologia</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						</div>
					</div>
					
				</div>

				<div class="col-sm-6 content-boxes-v3">
					<div class="clearfix margin-bottom-30">
						<i class="icon-custom icon-md rounded-x icon-bg-u icon-line    fa fa-star-o"></i>
						<div class="content-boxes-in-v3">
							<h2 class="heading-sm">Equipe Qualificada</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						</div>
					</div>
					<div class="clearfix margin-bottom-30">
						<i class="icon-custom icon-md rounded-x icon-bg-u icon-line icon-like"></i>
						<div class="content-boxes-in-v3">
							<h2 class="heading-sm">Resultado Garantido</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
			<!--=== Container Part ===-->
		<div class="testimonials-v3">
		
			<div class="headline-center margin-bottom-60">
				<h2 style="margin-top:-130px;margin-bottom:-29px;font-family: 'Indie Flower', cursive;">VEJA O QUE ESTÃO FALANDO SOBRE NÓS</h2>
			</div>
				
					<div class="col-md-8 col-md-offset-2">
						<ul class="list-unstyled owl-ts-v1">
							<li class="item">
								
								<div class="testimonials-v3-title">
									<p>Cristina Fernandes</p>
									<span>Cliente</span>
								</div>
								<p>Se permita, se curta... é tempo de ser mais .<p>
							</li>
							<li class="item">
								
								<div class="testimonials-v3-title">
									<p>Rodrigo B</p>
									<span>Cliente</span>
								</div>
								<p>Ótimo atendimento</p>
							</li>
							<li class="item">
								
								<div class="testimonials-v3-title">
									<p>John Clarck</p>
									<span>Marketing &amp; Cunsulting, IBM</span>
								</div>
								<p>So far I really like the theme. I am looking forward to exploring more of your themes. Thank you! At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
							</li>
						</ul>
					</div>
				
		
		</div>
		<br><br>
		
@endsection


@section('scripts')
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/588a8c2f2889654c4145a490/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->	
@endsection

