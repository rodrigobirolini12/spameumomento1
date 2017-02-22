<html lang="en">
<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0">

<title>Análise de dados</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
   <link rel="stylesheet" href="{{url('assets/pluglins_tcc/icheck/skins/square/green.css')}}" />
   <link rel="stylesheet" href="{{url('assets/pluglins_tcc/print/demo/css/normalize.min.css')}}">
   <link rel="stylesheet" href="{{url('assets/css/mapas/map-page.css')}}">
   <script src="https://use.fontawesome.com/9e608267f0.js"></script>
   <script src="{{url('assets/kml/RgbaToKml/rgbatokml.min.js')}}"></script>
   <script src="{{url('assets/js/mapas/cores.js')}}"></script>	
   <script src="{{url('assets/js/mapas/map-manipulate.js')}}"></script>	
   <script src="{{url('assets/js/util.js')}}"></script>	
    <script src="{{url('assets/js/mapas/templates-downloads.js')}}"></script>	

</head>
<body>


	<div class="content">
	<div class="col-md-6">
			<div id="loaddiv"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i><span id="msg-load">Carregando</span>.....&#160;&#160;&#160; Aguarde!</div>
                 <div id="map">
                 </div>
         </div>
		<div class="col-md-6" style="display:none">
			<div id="map1"></div>
		</div>
		
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body panel-primary text-center">
					<i class="fa fa-map-marker fa-lg"></i> Análise de Dados
					Espaciais
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Upload do Arquivo
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <form enctype="multipart/form-data" id="form-file" action="/upload/atributos" method="POST">
                    	{{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputFile">Selecione os arquivos com os dados a serem representados</label>
						<a class="btn btn-primary" data-toggle="modal" data-target="#regras" style="float:right;font-size:12px"><i class="fa fa-commenting-o"></i> Regras</a>
                        <input type="file" name="file" id="upload-file">
                        <p class="help-block">Arquivo CSV deverá conter informações separadas por ";" e caso tenha informações decimais, utilizar "."</p>
                      </div>
                    <button type="submit" class="btn btn-success" style="display:none"></button>
                    
                    </form>  
                    
                   <form  id="form-processamento" action="/processamento/analise" method="POST">
                   {{ csrf_field() }}   
                      <div class="form-group">
                          <label for="sel1">Analisar por:<small style="color:red"> ( *Desconsidere este campo caso a análise for dinâmica)</small></label>
                          <select class="form-control" id="select-analise">
                            
                          </select>
                      </div>
                   	
                   	<div class="form-group" >
                          <label for="sel1">Defina um título para o mapa:</label>
                          <input type="text" class="form-control" name="input-titulo" id="input-titulo" placeholder="insira o titulo">
                      </div>	
                   	
                  </div>
                </div>
              </div>
              
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Cores
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                     <p class="text-center">Selecione o esquema de cores:</p>
                     	<div class="text-center">
                     		  <label><input type="radio" class='ic' name="radio-cor"  value="azul"> Azul</label>
                     		  <label><input type="radio" class='ic' name="radio-cor"  value="espectral"> Espectral</label>
                     		  <label><input type="radio" class='ic' name="radio-cor"  value="verde" checked> Verde</label>
                     	      <label><input type="radio" class='ic' name="radio-cor"  value="vermelho"> Vermelho</label>
                     	      <label><input type="radio" class='ic' name="radio-cor"  value="vermelhoAzul"> Vermelho/Azul</label>
                     	      <label><input type="radio" class='ic' name="radio-cor"  value="diversas">Diversificada</label>
                     	</div>    
                     	<div class="form-group form-inline">
                        <label for="exampleInputName2">Transparência</label>
                        <input type="text" class="form-control" name="transparencia" id="input-transparencia" placeholder="0 a 100">%
                      </div>  
                  </div>
                 
                </div>
              </div>
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Legenda
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <div class="form-group">
                          <label for="sel1">Classes:</label>
                          <select class="form-control" id="select-classe">
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                          </select>
                      </div>
                      <div class="form-group" >
                          <label for="sel1">Método:</label>
                          <select class="form-control" id="select-metodo">
                            	<option value="1">Quebras naturais</option>
                            	<option value="2">Intervalos Iguais</option>
                            	<option value="3">Quantis</option>
                            	<option value="4">Intervalo Manual</option>
                          </select>
                      </div>
                      <div class="form-group  div-intervalo-manual"  style="clear:both;display:none">
                          <label for="sel1">Intervalos manuais:</label>
                          <input type="text" class="form-control" name="input-intervalo-manual" id="input-intervalo-manual" id="input-maximo" 
                          placeholder="Insira as classes seguindo o padrao 0-10;11-69;70-100">
                      </div>
                      <div class="form-group" style="width:40%;float:left">
                          <label for="sel1">Mínimo a ser considerado na legenda:</label>
                          <input type="text" class="form-control" name="transparencia" id="input-minimo" placeholder="Valor Minimo">
                      </div>
                      <div class="form-group" style="width:40%;float:left;margin-left:8px">
                          <label for="sel1">Máximo a ser considerado na legenda:</label>
                          <input type="text" class="form-control" name="transparencia" id="input-maximo" placeholder="Valor Máximo">
                      </div>
                      
                      <div class="form-group" style="clear:both;width:40%;">
                          <label for="sel1">*Casas decimais:(Informe a maior precisão encontrada nos dados a serem analisados)</label>
                          <select class="form-control" id="select-casas-decimais">
                            	<option value="0">0</option>
                            	<option value="1">1</option>
                            	<option value="2">2</option>
                            	<option value="3">3</option>
                            	<option value="3">4</option>
                            	<option value="3">5</option>
                            	<option value="3">6</option>
                            	<option value="3">7</option>
                            	<option value="3">8</option>
                            	<option value="3">9</option>
                          </select>
                      </div>
                      
                      
                  </div>
                </div>
              </div>
              
              
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Mapa Dinâmico
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                    <div class="form-group form-inline">
                        <label for="exampleInputName2">Informe em segundos o tempo entre atualizações</label>
                        <input type="text" class="form-control" name="input-tempo-atualizacao" id="input-tempo-atualizacao" placeholder="segundos">
                        <button type="button" class="btn btn-danger" style='display:none' id="button-stop"><i class="fa fa-spinner fa-spin fa fa-fw"></i> Parar</button>
                        <button type="button" class="btn btn-success" style='display:none' id="button-play"><i class="fa fa-play"></i> Continuar</button>
                        <br><br>
                        <small style="color:red"> ( *Forneça os segundos apenas se quiser uma análise dinâmica)</small>
                      </div>
                      
                  </div>
                </div>
              </div>
              
              
			</div>
			
			<button type="submit" class="btn btn-success">Enviar</button>
	</form>	
	<!-- <button  class="btn btn-default map-print" ><i class="fa fa-print"></i>Imprimir</button> -->	
				<a class="btn btn-primary" href="http://analisedadosbeta.herokuapp.com/motion/index"  style="float:right;"><i class="fa fa-arrow-circle-right"></i> Motion</a>
				<form method="get" action="/template/download" style="float:right">
						<input type="hidden" name="template" value="2">
						<button type="submit" class="btn btn-link" ><i class="fa fa-download"></i>Template Mapa Dinâmico</button>
				</form>
				<form method="get" action="/template/download" style="float:right">
				<input type="hidden" name="template" value="1">
						<button type="submit" class="btn btn-link" ><i class="fa fa-download"></i>Template</button>
				</form>
				
					
		</div>
	</div>
	
	
	<!-- Modal -->
  <div class="modal fade" id="regras" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Regras para criação do arquivo CSV e exibição dos mapas</h3S>
        </div>
        <div class="modal-body">
          <h3>Análise para um único mapa</h3>	
          <p>1. A primeira coluna deve conter o código da UF de cada estado de acordo com a tabela de código da UF do IBGE</p>
          <p>2. A segunda coluna deve conter o nome do estado</p>
          <p>3. As demais colunas pode conter qualquer nome <span style="color:red"></p>
          <p>4. O campo de casas decimais é obrigatório, deve ser preencido com o maior valor de casas decimais contidos no indicador de analise </p>
          <h3>Análise para mapa dinâmico</h3>
          <p>1. A primeira coluna deve conter o código da UF de cada estado de acordo com a tabela de código da UF do IBGE</p>
          <p>2. As demais colunas deve conter somente o ano relacionado aos dados</p>
          <p>3. Não é necessário preencher o campo "Analisar por", no caso de mapas dinâmicos</p>
          <p>4. É obrigatório informar os segundos relacionados a troca de mapas, na aba "Mapas Dinâmicos"</p>
          <h3>Faça download dos templates:</h3>
          <p><form method="get" action="/template/download" >
				<input type="hidden" name="template" value="1">
						<button type="submit" class="btn btn-link" ><i class="fa fa-download"></i>Template</button>
				</form>
				<form method="get" action="/template/download" >
						<input type="hidden" name="template" value="2">
						<button type="submit" class="btn btn-link" ><i class="fa fa-download"></i>Template Mapa Dinâmico</button>
				</form>
          <form method="get" action="/template/download" >
						<input type="hidden" name="template" value="3">
						<button type="submit" class="btn btn-link" ><i class="fa fa-download"></i>Template Motion</button>
				</form>
				
				</p>
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

		
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" 	integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"
		integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB"
		crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>
		<script src="{{url('assets/pluglins_tcc/icheck/icheck.js')}}"></script>
		<script src="{{url('assets/algoritmos/jenks.js')}}"></script>
		<script src="{{url('assets/algoritmos/quantis.js')}}"></script>
		<script 
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo">
    </script>
    <script type="text/javascript" src="{{url('assets/geoxml3/polys/geoxml3.js')}}">      </script>
    <script type="text/javascript" src="{{url('assets/geoxml3/ProjectedOverlay.js')}}">      </script>
    <script>
        window.jQuery || document.write('<script src="../bower_components/jquery/dist/jquery.min.js"><\/script>')
        </script>
        <script src="{{url('assets/pluglins_tcc/print/jQuery.print.js')}}"></script>
        

	<script>

			var arrDadosDeAnalise = "";
			var intervaloJenks = "";
			var intervaloQuantis = "";
			var countColunas = "";
			var loop  = 0;
			var loopDinamicMaps  = 1;
			var loopUm  = 0;
			var configInterval = "";
			var configInterval1 = "";
			var configInterval2 = "";
			var intervalMap1 = "";
			var map = "";
			var map1 = "";
			var centerControlDiv = "";
			var centerControl = "";
			var ctaLayer = "";
			var ctaLayer1 = "";
			var controlUI = "";
			var controlText = "";
			var controlTextTitulo = ""
			var nomeMapa = [1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213,1815546440,514087742,97077096,215026570,1639626257,711640213];
			var nomeMapaClone = [381504620,1731684942];
			var geoXml = "";
			var geoXml1 = "";
			var geoXmlDoc = null;
			var dadosMapas = [];
			var mapas = []; 
			var countMapas = 1;
			var t0 = ""; var t1 = "";
			var intervalBetweenMaps = "";
			var map1 = "";
			var a = "";
			var flagLoadMaps = 0;
			var duracaoLoop = 0;
			var tipoIteracao = 0;
			//se tipo de iteracao normal
			var mapaLegenda = "Sem dados";
			//se tipo de iteracao normal
			var mapaTitulo  = "Análise de Dados";
			var classe = "";
			
			  
	$(document).ready(function(){

			$('#select-analise').change(function(){
			jQuery.ajax({
                url: "/mapa/busca-dados-atributo",
                type: "POST",
                dataType: "json",
                data: {'atributoAnalise': $( "#select-analise option:selected" ).val(),
                	'_token':$( "input[name='_token']" ).val()

                    }

                
            }).done(function(data){
            	arrDadosDeAnalise = data.dadosAnalise;
            	
            }).fail(function(){
                
                alert("Fail send data");
            });
		})

			$("#select-metodo").change(function(){



				if($("#select-metodo").val() == 4){	
					$(".div-intervalo-manual").show();	
				}else{
					$(".div-intervalo-manual").hide();
				}
					
			});
			
    		$('#accordion').collapse({
    			  toggle: false
    			})
			
			
			
			$('.ic').iCheck({
			    checkboxClass: 'icheckbox_square-green',
			    radioClass: 'iradio_square-green',
			   
			  });

            
    		$("#upload-file").change(function(){
    			
    			$("#form-file").trigger('submit');
    		});

    	$( "#form-file" ).submit(function(e) {
    		
    		e.preventDefault();
    			
    		jQuery.ajax({
                url: "/upload/atributos",
                type: "POST",
                dataType: "JSON",
                data: new FormData( this ),
                processData: false,
                contentType: false
                
            }).done(function(data){
                var str = "";
            	
				countColunas = data.countColunas;
				str += "<option value=''>Selecione pelo que deseja analisar</option>";
                $(data.atributos).each(function (key, value) {
					str += '<option value=' + key + '>' + value + '</option>';
                })

                $('#select-analise').html(str);

                str = "";
            }).fail(function(){
                
                alert("Fail send data");
            });
    	});


    	$("#form-processamento").submit(function(e){

				clearMaps();
        		e.preventDefault();	
				//buscar todos os dados do form
				var atributoAnalise = $( "#select-analise option:selected" ).val();
				var transparencia = $("#input-transparencia").val();
				classe = $( "#select-classe option:selected" ).val();
				var metodo = $( "#select-metodo option:selected" ).val();
				var cor = $('input[name=radio-cor]:checked').val();
				var token = $( "input[name='_token']" ).val();
				var minimo = $("#input-minimo").val();
				var maximo = $("#input-maximo").val();
				var casasDecimais = $("#select-casas-decimais").val();
				var intervaloManual = $("#input-intervalo-manual").val();
				var titulo = $("#input-titulo").val();
				var tempoAtualizacao = $("#input-tempo-atualizacao").val() * 1000;
					duracaoLoop = tempoAtualizacao;

				//trata transparencia
				if(transparencia == ''){
					transparencia = 1;
				}
				else{
					transparencia = transparencia/100;
				}
				//obten cores kml
				cores = getCoresWithTrasnparencia(cor, transparencia);
				//console.log(cores);
				//return false;

				showLoad();
				if(tempoAtualizacao > 0){
							$("#msg-load").text('Preparando mapas');
							
							//habilita button stop
							$("#button-stop").show();
							//exibe primeiro mapa
							/*showMap(atributoAnalise,transparencia,classe,metodo,cor,
									token,minimo,maximo,casasDecimais,intervaloManual,titulo,tempoAtualizacao);*/
						
					configInterval = setInterval(showMap,1000,atributoAnalise,transparencia,classe,metodo,cor,
							token,minimo,maximo,casasDecimais,intervaloManual,titulo,tempoAtualizacao);
				}				
				else{

					maximo = (maximo == "")?getMaxOfArray(arrDadosDeAnalise):maximo;
					minimo = (minimo == "")?getMinOfArray(arrDadosDeAnalise):minimo;
					arrDadosDeAnalise =  removeElementsMinMax(arrDadosDeAnalise, parseFloat(minimo),parseFloat(maximo));
					
					if(metodo == 1){
						intervaloJenks = getJenksBreaks(arrDadosDeAnalise,classe,casasDecimais);
						//console.log(intervaloJenks);
					}else if (metodo == 3){
						intervaloQuantis = getQuantilesBreaks(arrDadosDeAnalise,classe,casasDecimais);
	                    //console.log(intervaloQuantis);
					}
				jQuery.ajax({
	                url: "/mapa/processamento",
	                
	                type: "POST",
	                dataType: "JSON",	
	                data: {'atributoAnalise': atributoAnalise,
							'transparencia':transparencia,
							'classe':classe,
							'metodo':metodo,	
							'cor':cor,
							'cores':cores,
							'_token':token,
							'minimo':minimo,
							'maximo':maximo,
							'casasDecimais': casasDecimais,
							'intervaloManual':intervaloManual,
							'intervaloQuantis':intervaloQuantis,
							'intervaloJenks': intervaloJenks,
							'titulo': titulo,
							'tempoAtualizacao': tempoAtualizacao
							}

	                
	            }).done(function(data){
		            mapaLegenda = data.legenda;
			        mapaTitulo  = data.titulo;
	            	geoXml1.parse('http://analisedadosbeta.herokuapp.com/assets/kml/'+data.nomeMapa+'.kml');
	                
	            }).fail(function(){
	                
	                console.log("Fail send data");
	            });
				
    	}
        })

        $('#button-stop').click(function(){
        	clearInterval(intervalBetweenMaps);
        	$(this).hide();
        	$('#button-play').show();
        });

    	$('#button-play').click(function(){
    		alteraLegenda('Sem Dados');
			alteraTitulo('Análise Espacial');
			geoXml.hideDocument(geoXml1.docs[loopDinamicMaps-1]);
    		loopDinamicMaps = 1;
    		initLoopMaps();
    		$(this).hide();
        	$('#button-stop').show();
        });
        
    					
	});

	 $('.map-print').on('click',

			    /*
			     * Print dat maps!
			     */
			    function printMaps() {
			      var body               = $('body');
			      var mapContainer       = $('#map');
			      var mapContainerParent = mapContainer.parent();
			      var printContainer     = $('<div>');

			      printContainer
			        .addClass('print-container')
			        .css('position', 'relative')
			        .height(mapContainer.height())
			        .append(mapContainer)
			        .prependTo(body);

			      var content = body
			        .children()
			        .not('script')
			        .not(printContainer)
			        .detach();
			        
			      // Patch for some Bootstrap 3.3.x `@media print` styles. :|
			      var patchedStyle = $('<style>')
			        .attr('media', 'print')
			        .text('img { max-width: none !important; }' +
			              'a[href]:after { content: ""; }')
			        .appendTo('head');

			      window.print();

			      body.prepend(content);
			      mapContainerParent.prepend(mapContainer);

			      printContainer.remove();
			      patchedStyle.remove();
			    });
		

	
	function initMap() {
  
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 11,
		zoomControl: true,
		zoomControlOptions:{
			 position: google.maps.ControlPosition.RIGHT_CENTER
		},
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    streetViewControl: false
	  });

	infowindow = new google.maps.InfoWindow({});
	  

	map1 = new google.maps.Map(document.getElementById('map1'), {
		zoom: 5,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	  });

	var legenda = "Sem dados";
	  // Create the DIV to hold the control and call the CenterControl() constructor
	  // passing in this DIV.
	  var centerControlDiv = document.createElement('div');
	  var centerControl = new CenterControl(centerControlDiv, map, legenda);
	  var tituloDiv = document.createElement('div');
	  var centerControl = new ConfigTitulo(tituloDiv, map);

	  centerControlDiv.index = 1;
	  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM   ].push(centerControlDiv);
	  map.controls[google.maps.ControlPosition.TOP_CENTER   ].push(tituloDiv);


	  	showLoad();
 		geoXml = new geoXML3.parser({
			map: map,				
 	 		markerOptions: {optimized: false},
 	 		infoWindow: infowindow,
            singleInfoWindow: true
		});
		
 		geoXml1 = new geoXML3.parser({
				
 	 		map: map1,
 	 		infoWindow: infowindow,
            singleInfoWindow: true,
 	 		afterParse: verifyLoadMaps,	
 	 		markerOptions: {optimized: false}
			
 	 		});

 		geoXml.parse('http://analisedadosbeta.herokuapp.com/assets/kml/kml-default-with-description.kml');
		geoXml1.parse('http://analisedadosbeta.herokuapp.com/assets/kml/kml-default-with-description.kml');

}
	
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo&&callback=initMap">
    </script>
	
</body>
</html>