@extends('spa.template')


@section('init-css')
	<link rel="stylesheet" href="{{url('assets/unify/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
	<link rel="stylesheet" href="{{url('assets/unify/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
@endsection

@section('content')
<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Contato</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">Ínicio</a></li>
					<li class="active">Contato</li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row margin-bottom-30">
				<div class="col-md-9 mb-margin-bottom-30">


					<!-- Google Map -->
					<div id="map" class="map map-box map-box-space margin-bottom-40"></div>
					<!-- End Google Map -->

					
					<p style="text-align: center">Envie suas dúvidas,elogios, comentários ou sugestões, quer por whatsapp, telefone, email, ou entre em contato atráves do nosso formulário de contato. Teremos o maior prazer para atender sua solicitação. </p>
					<br>

					<form action="assets/php/sky-forms-pro/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form sky-changes-3">
						<fieldset>
							<div class="row">
								<section class="col col-6">
									<label class="label">Nome</label>
									<label class="input">
										<i class="icon-append fa fa-user"></i>
										<input type="text" name="name" id="name" placeholder="Nome Completo">
									</label>
								</section>
								<section class="col col-6">
									<label class="label">E-mail</label>
									<label class="input">
										<i class="icon-append fa fa-envelope-o"></i>
										<input type="email" name="email" id="email" placeholder="Email">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="label">Telefone</label>
									<label class="input">
										<i class="icon-append fa fa-phone"></i>
										<input type="text" name="subject" id="subject" placeholder="(DDD) + telefone">
									</label>
								</section>

								<section class="col col-6">
									<label class="label">Motivo</label>
									<label class="input">
										<i class="icon-append fa fa-tag"></i>
										<input type="text" name="subject" id="subject" placeholder="Motivo do Contato">
									</label>
								</section>
							</div>

							<section>
								<label class="label">Sua Mensagem</label>
								<label class="textarea">
									<i class="icon-append fa fa-comment"></i>
									<textarea rows="4" name="message" id="message" placeholder="Ex: Gostaria de agendar o tratamento de carboxiterapia para semana que vem, na segunda feira."></textarea>
								</label>
							</section>

							

							
						</fieldset>

						<footer>
							<button type="submit" class="btn-u">Enviar Mensagem</button>
						</footer>

						<div class="message">
							<i class="rounded-x fa fa-check"></i>
							<p>Sua mensagem foi enviada com sucesso! Nossa equipe equipe entrará em contato o mais breve possível, pois sua mensagem é sempre bem-vinda.</p>
						</div>
					</form>
				</div><!--/col-md-9-->

				<div class="col-md-3">

				<!-- Contacts -->
					<div class="headline"><h2>Endereço</h2></div>
					<ul class="list-unstyled who margin-bottom-30">
						<li><a href="#"><i class="fa fa-home"></i>Av. Rio negro 745 Bairro: Riacho</a></li>
						<li><a href="#"><i class="fa fa-home"></i>CONTAGEM -MG</a></li>
					</ul>

					<!-- Contacts -->
					<div class="headline"><h2>Contatos</h2></div>
					<ul class="list-unstyled who margin-bottom-30">
						<li><a href="#"><i class="fa fa-envelope"></i>spameumomento@hotmail.com</a></li>
						<li><a href="#"><i class="fa fa-phone"></i> (31) 2565.9159</a></li>
						<li><a href="#"><i class="fa fa-whatsapp"></i>(31) 9950.9159</a></li>
					</ul>

					<!-- Business Hours -->
					<div class="headline"><h2>Funcionamento</h2></div>
					<ul class="list-unstyled margin-bottom-30">
						<li><strong>Segunda-Sexta:</strong> de 6 ás 20 horas</li>
						<li style="margin-top: 5px"><strong>Sábado&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <span class="label rounded-2x label-danger">Fechado</span></li>
						<li style="margin-top: 8px"><strong>Domingo  :</strong> <span class="label rounded-2x label-danger" >Fechado</span></li>
					</ul>

				</div><!--/col-md-3-->
			</div><!--/row-->

			
		</div><!--/container-->
		<!--=== End Content Part ===-->
		
		<!-- JS Page Level -->
@endsection



@section('implementing-plugins')
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&&key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/gmap/gmap.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/custom.js')}}"></script>
@endsection

@section('scripts')
<!-- JS Page Level -->
	<script type="text/javascript" src="{{url('assets/unify/js/app.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/forms/login.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/forms/contact.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/pages/page_contacts.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/owl-carousel.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/unify/js/plugins/style-switcher.js')}}"></script>
@endsection


@section('init-js')
		ContactPage.initMap();
		LoginForm.initLoginForm();
		ContactForm.initContactForm();
@endsection