

@extends('painel.templates.index')


@section('slide')
	@parent	
	Conteúdo do slide
@endsection

<p><a href="users/adicionar">Cadastrar</a></p>

@section('content')
<h1>Listagem dos usuarios do painel</h1>
@if($status != "")
   {{$status}}
@endif

	{{--Listagem dos carros--}}
    @forelse($users as $user)
    	<p><b>Email|nome: </b>{{$user->name}} ({{$user->email}}) <a href="users/editar/{$user->id}">Editar</a>
    	<a href="users/deletar/$user->id">Deletar</a>	
    	</p>
    @empty
    	<p>NENHUM Usuario CADASTRADO!</p>
    @endforelse	
   {!!$users->render()!!}
@endsection