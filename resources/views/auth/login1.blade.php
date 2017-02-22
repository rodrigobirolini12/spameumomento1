<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
		<!--  Jquery -->
		<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<link rel="stylesheet" href="{{url('assets/painel/css/default.css')}}">
		<link rel="stylesheet" href="{{url('assets/painel/css/default-responsivo.css')}}">
</head>
<body class= 'bg-padrao'>
		
		<header>
			<h1  class= "oculta" >Login - EspecializaTi</h1>
		</header>

		<section class="login">
			<div class="topo-login">
				<h1 class="titulo-login">Login - Curso de front-en</h1>
			</div>

			<div class="conteudo-login">
				<form class="form-padrao" role="form" method="POST" action="{{ url('/login') }}">
					  {!! csrf_field() !!}
					<div class="form-group">
						<input class="form-control" type='text' name='email' placeholder="Usuário">	
					</div>
					<div class="form-group">
						<input class="form-control" type='password' name='password' placeholder="senha">	
					</div>
					<a href="esqueceu-senha" class='pull-right' style="margin:5px" data-toggle="modal" data-target="#recuperar-senha">Esqueceu a senha?</a>
					<input type="submit" name="btn-enviar" value="Entrar" class='btn-default-padrao '>
				</form> 
			</div>
		</section>



<!-- Modal Recuperar Senha-->
<div class="modal fade" id="recuperar-senha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-topo-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recuperar Senha</h4>
      </div>
      <div class="modal-body">
        <div class="conteudo-login">
				<form class="form-padrao">
					<div class="form-group">
						<input class="form-control" type='text' name='email' placeholder="Email">	
					</div>
				</form> 
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Enviar Email</button>
      </div>
    </div>
  </div>
</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>