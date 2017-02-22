@extends('painel.templates.index')


@section('slide')
	@parent	
	Conteúdo do slide
@endsection

<p><a href="carros/adicionar">Cadastrar</a></p>

<p>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Cadastrar via ajax
</button>
</p>


@section('content')
<p>{{Auth::user()}}</p>
<h1>Listagem dos carros do painel</h1>
	{{--Listagem dos carros--}}
    @forelse($carros as $carro)
    	<p><b>Nome: </b>{{$carro->nome}} ({{$carro->placa}}) <a href="carros/editar/{{$carro->id}}">Editar</a>
    	<a href="carros/deletar/{{$carro->id}}">Deletar</a>	
    	</p>
    @empty
    	<p>NENHUM CARRO CADASTRADO!</p>
    @endforelse	
   {!!$carros->render()!!}
   
   <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <form method="POST" class="form" action="carros/adicionarAjax" send="carros/adicionarAjax">
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
           
       <div class="preloader" style="display:none"></div> 	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Gravar</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
	$(function(){
		$(".form").submit(function(e){

			e.preventDefault();
				var dadosForm = $(this).serialize();

				$.ajax({

					url: $(this).attr('send'),
					data: dadosForm,
					type: "POST",
					beforeSend: iniciaPreloader(), 					
		
				}).done(function(data){
					//alert(data);
					finalizaPreloader();
					if(data == 1){
						location.reload();
					}
					else{
						alert(data);
					}
				}).fail(function(){
					finalizaPreloader();
				});
			
			});
	});


	function iniciaPreloader(){
		$("preloader").show()
	}
	
	function finalizaPreloader(){
		$("preloader").hide();
	}
</script>
	
@endsection



