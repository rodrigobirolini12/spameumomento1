<html lang="en">
<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0">

<title>Analise de dados</title>
<style>
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
                      Collapsible Group Item #1
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                     		  <label><input type="radio" class='ic' name="iCheck"> Azul</label>
                     		  <label><input type="radio" class='ic' name="iCheck"> Espectral</label>
                     		  <label><input type="radio" class='ic' name="iCheck"> Verde</label>
                     	      <label><input type="radio" class='ic' name="iCheck"> Vermelho</label>
                     	      <label><input type="radio" class='ic' name="iCheck"> Vermelho/Azul</label>
                     	</div>      
                  </div>
                </div>
              </div>
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
</div>
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
    		$('#accordion').collapse({
    			  toggle: false
    			})

			$('.ic').iCheck({
			    checkboxClass: 'icheckbox_square-green',
			    radioClass: 'iradio_square-green',
			   
			  });
				
		});

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
 
  });

  var ctaLayer = new google.maps.KmlLayer({
    url: 'https://sites.google.com/site/kmlrepositorio/my-forms/estado-kml/teste-xml800.kml',
    map: map
  });


}
	
    </script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo&signed_in=true&callback=initMap">
    </script>
</body>
</html>