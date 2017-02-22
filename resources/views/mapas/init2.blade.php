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
    margin-right:52px;	
	
}


#map {
	height: 100%;
	width: 100%;
}

.panel-primary {
	background-color: 1D9D74;
	color: white;
	font-size: 16px;
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
   <link rel="stylesheet" href="http://laravel.dev/assets/pluglins_tcc/icheck/skins/square/green.css" />	
<script src="https://use.fontawesome.com/9e608267f0.js"></script>
<script src="http://laravel.dev/assets/kml/RgbaToKml/rgbatokml.min.js"></script>

</head>
<body>


	<div class="content">
		<div class="col-md-6">
			<div id="map"></div>
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
                    <button type="submit" class="btn btn-success" style="display:none">Enviar</button>
                    </form>  
                    
                   <form  id="form-processamento" action="/processamento/analise" method="POST">
                   {{ csrf_field() }}   
                      <div class="form-group">
                          <label for="sel1">Analisar por:</label>
                          <select class="form-control" id="select-analise">
                            
                          </select>
                      </div>
                   
                      <div class="form-group form-inline">
                        <label for="exampleInputName2">Transparência</label>
                        <input type="text" class="form-control" name="transparencia" id="input-transparencia" placeholder="0 a 100">%
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
                     	      <label><input type="radio" class='ic' name="radio-cor"  value="vermelho/Azul"> Vermelho/Azul</label>
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
                      <div class="form-group">
                          <label for="sel1">Métoto:</label>
                          <select class="form-control" id="select-metodo">
                            	<option value="1">Quebras naturais</option>
                            	<option value="2">Intervalos Iguais</option>
                            	<option value="3">Quuantis</option>
                            	<option value="4">Intervalo Manual</option>
                          </select>
                      </div>
                  </div>
                </div>
              </div>
			</div>
			
			<button type="submit" class="btn btn-success">Enviar</button>
			<button type="submit" class="btn btn-success" id="btn-teste">Enviar</button>
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
		<script src="http://laravel.dev/assets/pluglins_tcc/icheck/icheck.js"></script>
	<script>

	$(document).ready(function(){

			//ca
            $("#btn-teste").click(function(){

				trocaMapa();
				
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
            	

                $(data).each(function (key, value) {
					str += '<option value=' + key + '>' + value + '</option>';
                })

                $('#select-analise').html(str);

                str = "";
            }).fail(function(){
                
                alert("Fail send data");
            });
    	});


    	$("#form-processamento").submit(function(e){
				e.preventDefault();

				//buscar todos os dados do form
				var atributoAnalise = $( "#select-analise option:selected" ).val();
				var transparencia = $("#input-transparencia").val();
				var classe = $( "#select-classe option:selected" ).val();
				var metodo = $( "#select-metodo option:selected" ).val();
				var cor = $('input[name=radio-cor]:checked').val();
				var token = $( "input[name='_token']" ).val();
				
				//trata transparencia
				if(transparencia == ''){
					transparencia = 1;
				}
				else{
					transparencia = transparencia/100;
				}
				//obten cores kml
				cores = getCoresWithTrasnparencia(cor, transparencia);

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
							'_token':token
							}

	                
	            }).done(function(data){
	                alert('deu ruin');
	            }).fail(function(){
	                
	                alert("Fail send data");
	            });
				
				
        })
    					
	});



	function getCoresWithTrasnparencia(cor, transparencia){

		var cores = [];
		concatenando = "'0,68,27,"+transparencia+"'";
		console.log(concatenando);
		
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
			alert('cor é azul');	
		}
		else if(cor == "vermelho"){
			alert('cor é vermelho');
		}


	}
	
	
	function constroiLegenda(){

		return "<b>Legenda</b><br><span style='background-color:black' class='gpmCaixaCor'></span><span class='spanLegenda'>Sem dados</span>";
		}
	/**
	 * The CenterControl adds a control to the map that recenters the map on Chicago.
	 * This constructor takes the control DIV as an argument.
	 * @constructor
	 */
	function CenterControl(controlDiv, map) {

	  // Set CSS for the control border.
	  var controlUI = document.createElement('div');
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
	  var controlText = document.createElement('div');
	  controlText.style.color = 'rgb(25,25,25)';
	  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	  controlText.style.fontSize = '12px';
	  controlText.style.lineHeight = '20px';
	  controlText.style.paddingLeft = '5px';
	  controlText.style.paddingRight = '5px';
	  controlText.innerHTML = constroiLegenda();
	  controlUI.appendChild(controlText);

	  

	}


	function trocaMapa() {
			
		alert('entrou');
		  var map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 11,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		  });


		  // Create the DIV to hold the control and call the CenterControl() constructor
		  // passing in this DIV.
		  var centerControlDiv = document.createElement('div');
		  var centerControl = new CenterControl(centerControlDiv, map);

		  centerControlDiv.index = -1;
		  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM   ].push(centerControlDiv);
			
		  var ctaLayer = new google.maps.KmlLayer({
		    url: 'https://sites.google.com/site/kmlrepositorio/my-forms/estado-kml/default-kml-with-description.kml',
		    suppressInfoWindows: false,
		    map: map,
		    
		  });
		 
			
		}

	
function initMap() {

	
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });


  // Create the DIV to hold the control and call the CenterControl() constructor
  // passing in this DIV.
  var centerControlDiv = document.createElement('div');
  var centerControl = new CenterControl(centerControlDiv, map);

  centerControlDiv.index = -1;
  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM   ].push(centerControlDiv);
	
  var ctaLayer = new google.maps.KmlLayer({
    url: 'https://sites.google.com/site/kmlrepositorio/my-forms/estado-kml/default-kml2-111.kml',
    suppressInfoWindows: false,
    map: map,
    
  });
 
	
}
	
    </script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo&signed_in=true&callback=initMap">
    </script>
</body>
</html>