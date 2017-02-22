@extends('painel.templates.index')

@section('content')
	<h1>{{Crypt::decrypt($titulo)}}</h1>
	
	{{print_r($carros)}}
@endsection