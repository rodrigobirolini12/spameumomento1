
@if(count($errors)> 0)
	@foreach($errors->all() as $error)
		{{$error}}
	@endforeach
@endif

@if(isset($carro))
<form method="POST" action="http://laravel.dev/carros/updatebd/{{$carro->id}}">
@else
<form method="POST" action="adicionarBd">
@endif
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="nome" value="<?php echo (isset($carro->nome))?"$carro->nome":""?>" placeholder="Digite o nome...">
    <input type="text" name="placa" value="<?php echo (isset($carro->placa))?"$carro->placa":""?>" placeholder="Digite a placa...">
    <select name="id_marca">
    	@if(count($marcas)> 0)
        	@foreach($marcas as $m)
        		<option value="{{$m->id}}">{{$m->marca}}</option>
        	@endforeach
        @endif
    </select>
    <input type="submit"  value="gravar">
</form>