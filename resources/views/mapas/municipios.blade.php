<html lang="en">
<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0">

<title>Analise de dados</title>
<style>

.gpmCaixaLegenda {
    font-family: 'Arial Narrow', 'Arial', sans-serif;
    font-size: 10pt;
    background-color: #FFF;
    margin: 10px;
    padding: 5px;
    border: thin black solid;
    box-shadow: -3px 3px 8px #888;
    line-height: 1.25;
}

.gpmCaixaCor {
    height: 12px;
    width: 12px;
    margin-right: 3px;
    float: left;
    display: block;
    border: thin black solid;
	margin-top:4px;
}

.gpmCaixaLegenda p {
    /* font-weight: bold; */
    text-transform: uppercase;
    margin-top: 3px;
}

.spanLegenda{
    margin-right:2px;	
	
}


#map {
	height: 100%;
	width: 100%;
}

#map1 {
	height: 100%;
	width: 100%;
}



.panel-primary {
	background-color: 1D9D74;
	color: white;
	font-size: 16px;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 16px;
  height: 16px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#loaddiv
{
    BORDER-RIGHT: #785e4f 4px groove;
    PADDING-RIGHT: 20px;
    BORDER-TOP: #785e4f 4px groove;
    PADDING-LEFT: 20px;
    FONT-WEIGHT: bold;
    Z-INDEX: 100;
    FILTER: alpha(opacity=75);
    LEFT: 260px;
    PADDING-BOTTOM: 20px;
    MARGIN-LEFT: auto;
    BORDER-LEFT: #785e4f 4px groove;
    WIDTH: 250px;
    MARGIN-RIGHT: auto;
    PADDING-TOP: 20px;
    BORDER-BOTTOM: #785e4f 4px groove;
    POSITION: absolute;
    TOP: 308px;
    BACKGROUND-COLOR: #FFFFFF; /* BACKGROUND-COLOR: #e7b047; */
    TEXT-ALIGN: center;
    opacity: .75
}

.infowindow * {font-size: 50%; margin: 0}

#iw-container  .iw-title {
   font-family: 'Open Sans Condensed', sans-serif;
   font-size: 22px;
   font-weight: 400;
   padding: 10px;
   background-color: #48b5e9;
   color: white;
   margin: 1px;
   border-radius: 2px 2px 0 0; /* De acordo com o arredondamento dos cantos da infowindow por padrão. */
}

h3 {
	color:#1D9D74 !important;
	font-size:18px !important; 
    }
.gm-style .gm-style-iw {
    font-weight: 300;
    font-size: 18px !important;
    overflow: hidden;
}

</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
   <link rel="stylesheet" href="{{url('assets/pluglins_tcc/icheck/skins/square/green.css')}}" />	
<script src="https://use.fontawesome.com/9e608267f0.js"></script>
<script src="{{url('assets/kml/RgbaToKml/rgbatokml.min.js')}}"></script>

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
					<i class="fa fa-map-marker fa-lg"></i> Análise Geográfica de Dados
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
                        <label for="exampleInputFile">Selecione os arquivos com os dados a serem analisados</label>
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
                     <p class="text-center">Selecione a cor do mapa:</p>
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
                          <label for="sel1">Métoto:</label>
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
                        <label for="exampleInputName2">Informe em segundos o tempo de atualização</label>
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
		</div>
	</div>
	
		
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"
		integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY"
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

function showDinamicMaps(){
		
		if(loopDinamicMaps == 1){
			alteraLegenda(dadosMapas[1][1]);
			alteraTitulo(dadosMapas[1][2]);
			geoXml.hideDocument(geoXml.docs[0]);
			console.log('geoXml.hideDocument(geoXml.docs[0])');
			geoXml.showDocument(geoXml1.docs[1]);
			console.log('geoXml.showDocument(geoXml1.docs[1])');
			loopDinamicMaps++;	
		}else if(loopDinamicMaps == mapas.length+1){
			alteraLegenda(dadosMapas[1][1]);
			alteraTitulo(dadosMapas[1][2]);
			geoXml.hideDocument(geoXml1.docs[loopDinamicMaps-1]);
			loopDinamicMaps = 1;
			geoXml.showDocument(geoXml1.docs[loopDinamicMaps]);
			loopDinamicMaps++;
		}
		else{
			alteraLegenda(dadosMapas[loopDinamicMaps][1]);
			alteraTitulo(dadosMapas[loopDinamicMaps][2]);
			geoXml.hideDocument(geoXml1.docs[loopDinamicMaps-1]);
			geoXml.showDocument(geoXml1.docs[loopDinamicMaps]);
			loopDinamicMaps++;
		}
	}
	


	function showMap(atributoAnalise,transparencia,classe,metodo,cor,
			token,minimo,maximo,casasDecimais,intervaloManual,titulo,tempoAtualizacao){


		indicesArray = countColunas - 1;

		jQuery.ajax({
            url: "/mapa/busca-dados-atributo",
            type: "POST",
            dataType: "json",
            data: {'atributoAnalise': loop,
            	'_token':$( "input[name='_token']" ).val()

                },
		success:function(data){
        	arrDadosDeAnaliseDinamica = data.dadosAnalise;
        	maximo = (maximo == "")?getMaxOfArray(arrDadosDeAnaliseDinamica):maximo;
    		minimo = (minimo == "")?getMinOfArray(arrDadosDeAnaliseDinamica):minimo;
    		arrDadosDeAnaliseDinamica =  removeElementsMinMax(arrDadosDeAnaliseDinamica, parseFloat(minimo),parseFloat(maximo));
    		
    		if(metodo == 1){
    			intervaloJenks = getJenksBreaks(arrDadosDeAnaliseDinamica,classe,casasDecimais);
    			console.log(intervaloJenks);
    		}else if (metodo == 3){
    			intervaloQuantis = getQuantilesBreaks(arrDadosDeAnaliseDinamica,classe,casasDecimais);
                console.log(intervaloQuantis);
    		}

    		processamento(loop,transparencia,classe,metodo,cor,
    				token,minimo,maximo,casasDecimais,intervaloManual,intervaloQuantis,intervaloJenks,titulo,tempoAtualizacao);
        }
            
        });
     }

	function clearMaps(){
		
		if(geoXml1.docs.length == 1){
			return;
		}	
		else{
			if(tipoIteracao == 0){
				alteraLegenda("Sem Dados");
				alteraTitulo("Analise Espacial");
				geoXml.hideDocument(geoXml1.docs[1]);
				}//end if
			else if(tipoIteracao == 1){
				
				alteraLegenda('Sem Dados');
				alteraTitulo('Análise Espacial');
				geoXml.hideDocument(geoXml1.docs[loopDinamicMaps-1]);
	    		loopDinamicMaps = 1;
	    		tipoIteracao = 0;
	    		
			}
			
			while(geoXml1.docs.length != 1){
				geoXml1.docs.pop();
			}

			//alert('limpou');
			return false;
		}//end else externo
	}
	
	function processamento(atributoAnalise,transparencia,classe,metodo,cor,
			token,minimo,maximo,casasDecimais,intervaloManual,intervaloQuantis,intervaloJenks,titulo,tempoAtualizacao){
		//alert(loop);
		jQuery.ajax({
            url: "/mapa/processamento",
            type: "POST",
            dataType: "JSON",	
            data: {'atributoAnalise': loop,
					'transparencia':transparencia,
					'classe':classe,
					'metodo':metodo,	
					'cor':cor,
					'cores':cores,
					'_token':$( "input[name='_token']" ).val(),
					'minimo':minimo,
					'maximo':maximo,
					'casasDecimais': casasDecimais,
					'intervaloManual':intervaloManual,
					'intervaloQuantis':intervaloQuantis,
					'intervaloJenks': intervaloJenks,
					'titulo': titulo,
					'tempoAtualizacao':tempoAtualizacao
					},
			success:function(data){
				//trocaMapa(data.nomeMapa, data.legenda,data.titulo);
				dadosMapas[countMapas] = [data.nomeMapa, data.legenda,data.titulo];
				countMapas++;
				//geoXml1.parse('http://analisedadosbeta.herokuapp.com/assets/kml/'+data.nomeMapa+'.kml');
				console.log(dadosMapas);
				
				if(loop == indicesArray){
					//alert('entrou');
					stopProcessamento();
					loop = 1;
					createArrayMaps();	
				}else{
						loop++;
					}
				}
	        });
	}


	function createArrayMaps(){

		for (i = 1; i < dadosMapas.length; i++){
			mapas.push('http://analisedadosbeta.herokuapp.com/assets/kml/'+dadosMapas[i][0]+'.kml');
		}
		//carrega todos os mapas
		loadMaps();
		
	}//end function createArrayMaps

	function loadMaps(){
		geoXml1.parse(mapas);
		flagLoadMaps = 1;
		tipoIteracao = 1;
	}


	function initLoadMap(){
		map1 = setInterval(showMapNormal,1000);
		}

	function showMapNormal(){
		alteraLegenda(mapaLegenda);
		alteraTitulo(mapaTitulo);
		geoXml.hideDocument(geoXml.docs[0]);
		//console.log('geoXml.hideDocument(geoXml.docs[0])');
		geoXml.showDocument(geoXml1.docs[1]);
		//console.log('geoXml.showDocument(geoXml1.docs[1])');
		stopMap1();
		
	}
	
	function initLoopMaps(){
		
		//faz o carregamento do primeiro mapa mais rapido
		if(duracaoLoop != 1 && duracaoLoop != 2 && duracaoLoop != 3 ){
			intervalMap1 = setInterval(showMap1,1);
		}
		
		intervalBetweenMaps = setInterval(showDinamicMaps,duracaoLoop);
	}

	function showMap1(){
		alteraLegenda(dadosMapas[1][1]);
		alteraTitulo(dadosMapas[1][2]);
		geoXml.hideDocument(geoXml.docs[0]);
		console.log('geoXml.hideDocument(geoXml.docs[0])');
		geoXml.showDocument(geoXml1.docs[1]);
		console.log('geoXml.showDocument(geoXml1.docs[1])');
		loopDinamicMaps++;
		stopIntervalMap1();
	}



	// A function to hide the loading message
	function hideLoad()
	{
	   var loaddiv = document.getElementById("loaddiv");
	   if (loaddiv == null)
	   {
	      alert("Sorry can't find the loaddiv");
	      return;
	   }
	   //div found
	   loaddiv.style.visibility="hidden";
	}

	// A function to hide the loading message
	function showLoad()
	{
	   var loaddiv = document.getElementById("loaddiv");
	   if (loaddiv == null)
	   {
	      alert("Sorry can't find your loaddiv");
	      return;
	   }
	   //div found
	   loaddiv.style.visibility="visible";
	}
		


	function removeElementsMinMax(dadosAnalise, minimo, maximo){
		newDadosAnalise1 = [];
		indice = 0;
		
		//alert(minimo);alert(maximo);
		for (i = 0; i < dadosAnalise.length; i++) { 
			if(dadosAnalise[i] >= minimo && dadosAnalise[i] <= maximo){
				
				newDadosAnalise1[indice] =  dadosAnalise[i];
				indice++;
            }
		}
		;
		return newDadosAnalise1;
		
	}

	function getMaxOfArray(numArray) {
	    return Math.max.apply(null, numArray);
	}
	function getMinOfArray(numArray) {
	    return Math.min.apply(null, numArray);
	}

	function getCoresWithTrasnparencia(cor, transparencia){

		var cores = [];
		concatenando = "'0,68,27,"+transparencia+"'";
		//console.log(concatenando);
		
		if(cor == "verde"){
			
				 cores[1] = converter.rgbaToKml('0,68,27,'+transparencia);
				 cores[2] = converter.rgbaToKml('0,109,44,'+transparencia);
				 cores[3] = converter.rgbaToKml('35,139,69,'+transparencia);
				 cores[4] = converter.rgbaToKml('65,171,93,'+transparencia);
			  	 cores[5] = converter.rgbaToKml('116,196,118,'+transparencia);
			  	 cores[6] = converter.rgbaToKml('161,217,155,'+transparencia);
			  	 cores[7] = converter.rgbaToKml('199,233,192,'+transparencia);
			  	 cores[8] = converter.rgbaToKml('229,245,224,'+transparencia);
			  	 cores[9] = converter.rgbaToKml('247,252,245,'+transparencia);
			  	 return cores;
			}
		else if(cor == "azul"){
			 cores[1] = converter.rgbaToKml('8,48,107,'+transparencia);
			 cores[2] = converter.rgbaToKml('8,81,156,'+transparencia);
			 cores[3] = converter.rgbaToKml('33,113,181,'+transparencia);
			 cores[4] = converter.rgbaToKml('66,146,198,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('107,174,214,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('158,202,225,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('198,219,239,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('222,235,247,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('247,251,255,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelho"){
			 cores[1] = converter.rgbaToKml('103,0,13,'+transparencia);
			 cores[2] = converter.rgbaToKml('165,15,21,'+transparencia);
			 cores[3] = converter.rgbaToKml('203,24,29,'+transparencia);
			 cores[4] = converter.rgbaToKml('239,59,44,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('251,106,74,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('252,146,114,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('252,187,161,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('252,187,161,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('255,245,240,'+transparencia);
		  	 return cores;
		}
		else if(cor == "espectral"){
			 cores[1] = converter.rgbaToKml('50,136,189,'+transparencia);
			 cores[2] = converter.rgbaToKml('102,194,165,'+transparencia);
			 cores[3] = converter.rgbaToKml('171,221,164,'+transparencia);
			 cores[4] = converter.rgbaToKml('230,245,152,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('255,255,191,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('254,224,139,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('253,174,97,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('244,109,67,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('213,62,79,'+transparencia);
		  	 return cores;
		}

		else if(cor == "vermelhoAzul" && classe ==9 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('67,147,195,'+transparencia);
			 cores[3] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[4] = converter.rgbaToKml('209,229,240,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('244,165,130,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('214,96,77,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('214,96,77,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('178,24,43,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 3 ){
			 cores[1] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[2] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[3] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[4] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 4 ){
			 cores[1] = converter.rgbaToKml('5,113,176,'+transparencia);
			 cores[2] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[3] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[4] = converter.rgbaToKml('202,0,32,'+transparencia);
			 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 5 ){
			 cores[1] = converter.rgbaToKml('5,113,176,'+transparencia);
			 cores[2] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[3] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[4] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[5] = converter.rgbaToKml('202,0,32,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 6 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[3] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[4] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[5] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[6] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 7 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[3] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[4] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[5] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[6] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[7] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 8 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('67,147,195,'+transparencia);
			 cores[3] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[4] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[5] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[6] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[7] = converter.rgbaToKml('214,96,77,'+transparencia);
			 cores[8] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "diversas"){
			 cores[1] = converter.rgbaToKml('228,26,28,'+transparencia);
			 cores[2] = converter.rgbaToKml('55,126,184,'+transparencia);
			 cores[3] = converter.rgbaToKml('77,175,74,'+transparencia);
			 cores[4] = converter.rgbaToKml('152,78,163,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('255,127,0,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('255,255,51,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('166,86,40,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('247,129,191,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('153,153,153,'+transparencia);
		  	 return cores;
		}
		


	}
	
	
	function constroiLegenda(){

		return "<b>Legenda</b><br><span style='background-color:rgb(116,196,118)' class='gpmCaixaCor'></span><span class='spanLegenda'>217583-6491851</span></br><span style='background-color:rgb(65,171,93)' class='gpmCaixaCor'></span><span class='spanLegenda'>6491851-12766119</span></br><span style='background-color:rgb(35,139,69)' class='gpmCaixaCor'></span><span class='spanLegenda'>12766119-19040387</span></br><span style='background-color:rgb(0,109,44)' class='gpmCaixaCor'></span><span class='spanLegenda'>19040387-25314655</span></br><span style='background-color:rgb(0,68,27)' class='gpmCaixaCor'></span><span class='spanLegenda'>25314655-31588925</span></br>";
		}
	/**
	 * The CenterControl adds a control to the map that recenters the map on Chicago.
	 * This constructor takes the control DIV as an argument.
	 * @constructor
	 */
	function CenterControl(controlDiv, map,legenda) {

	  // Set CSS for the control border.
	  controlUI = document.createElement('div');
	  controlUI.style.backgroundColor = '#fff';
	  controlUI.style.border = '2px solid #fff';
	  controlUI.style.borderRadius = '3px';
	  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	  controlUI.style.cursor = 'pointer';
	  controlUI.style.margin = '10px';
	  controlUI.style.textAlign = 'center';
	  controlUI.style.width = '150px';
	  controlUI.title = 'Click to recenter the map';
	  controlDiv.appendChild(controlUI);

	  // Set CSS for the control interior.
	  controlText = document.createElement('div');
	  controlText.style.color = 'rgb(25,25,25)';
	  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	  controlText.style.fontSize = '12px';
	  controlText.style.lineHeight = '20px';
	  controlText.style.paddingLeft = '5px';
	  controlText.style.paddingRight = '5px';
	  controlText.innerHTML = legenda;
	  controlUI.appendChild(controlText);

	  

	}

	function alteraLegenda(legenda){
		 controlText.innerHTML = legenda;
	}

	function alteraTitulo(titulo){
		 controlTextTitulo.innerHTML = titulo;
	}

	/**
	 * The CenterControl adds a control to the map that recenters the map on Chicago.
	 * This constructor takes the control DIV as an argument.
	 * @constructor
	 */
	function ConfigTitulo(controlDiv, map) {

	  // Set CSS for the control border.
	 controlUI = document.createElement('div');
	  controlUI.style.backgroundColor = '#fff';
	  controlUI.style.border = '2px solid #fff';
	  controlUI.style.borderRadius = '3px';
	  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	  controlUI.style.cursor = 'pointer';
	  controlUI.style.marginBottom = '22px';
	  controlUI.style.marginTop = '10px';
	  controlUI.style.textAlign = 'center';
	  controlUI.title = 'Click to recenter the map';
	  controlDiv.appendChild(controlUI);

	  // Set CSS for the control interior.
	 controlTextTitulo = document.createElement('div');
	  controlTextTitulo.style.color = 'rgb(25,25,25)';
	  controlTextTitulo.style.fontFamily = 'Roboto,Arial,sans-serif';
	  controlTextTitulo.style.fontSize = '16px';
	  controlTextTitulo.style.lineHeight = '38px';
	  controlTextTitulo.style.paddingLeft = '5px';
	  controlTextTitulo.style.paddingRight = '5px';
	  controlTextTitulo.innerHTML = 'Análise De Dados';
	  controlUI.appendChild(controlTextTitulo);


	}


	function stopProcessamento() {
	    clearInterval(configInterval);
	}

	function stopIntervalMap1() {
	    clearInterval(intervalMap1);
	}

	function stopMap1() {
	    clearInterval(map1);
	}

	function verifyLoadMaps(){

		
		
		hideLoad();

		if(tipoIteracao == 0){
				initLoadMap();
			} 
		else if(flagLoadMaps == 1 && tipoIteracao == 1){
				initLoopMaps();
			}
	}

	


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
		zoom: 11,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	  });

	


	var legenda = "Sem dados";
	  // Create the DIV to hold the control and call the CenterControl() constructor
	  // passing in this DIV.
	  var centerControlDiv = document.createElement('div');
	  var centerControl = new CenterControl(centerControlDiv, map, legenda);
	  var tituloDiv = document.createElement('div');
	  var centerControl = new ConfigTitulo(tituloDiv, map);

	  centerControlDiv.index = -1;
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

 		geoXml.parse('http://analisedadosbeta.herokuapp.com/assets/kml/municipios.kml');
		geoXml1.parse('http://analisedadosbeta.herokuapp.com/assets/kml/municipios.kml');
		
	
}
	
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo&&callback=initMap">
    </script>
	
</body>
</html>