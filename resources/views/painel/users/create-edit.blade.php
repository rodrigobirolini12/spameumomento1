

@if(count($errors)> 0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

@if(isset($user))
<form method="POST" action="http://laravel.dev/users/editar/$user->id">
@else
<form method="POST" action="adicionar">
@endif
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="name" value="<?php echo (isset($user->name))?"$user->name":""?>" placeholder="Digite o nome...">
    <input type="text" name="email" value="<?php echo (isset($user->email))?"$user->email":""?>" placeholder="Digite o email...">
    <input type="password" name="password">
    <input type="submit"  value="gravar">
</form>