<html>
  <head>
  <link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
  crossorigin="anonymous">
  <script src="https://use.fontawesome.com/9e608267f0.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
<style type="text/css">    
    .panel-primary {
  background-color: 1D9D74;
  color: white;
  font-size: 16px;
}
</style>
    
  </head>
  <body>
    
    
    <div class="content">
      <div class="col-md-7">
        <div id="chart_div" style="width: 100%; height: 100%;"></div>   
      </div>
   
      <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-body panel-primary text-center">
          <!--  --><i class="fa fa-line-chart fa-lg"></i>Motion Chart 
        </div>
      </div>
    </div>
    <div class="col-md-5">
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
                    <button type="submit" class="btn btn-success" style="display:none">Enviar</button>
                    </form>  
                    
                   <form  id="form-processamento" action="/motion/processamento" method="POST">
                   {{ csrf_field() }}   
                      <div style="display:none" id="indicadores-encontrados">
                          <label for="sel1">Indicadores Encontrados:</label>
                          <br>
                          <div class="div-indicadores-encontrados">
                          
                          </div>
                      </div>
                      <div  style="display:none" id="anos-encontrados">
                          <label for="sel1">Anos Encontrados:</label>
                          <br>
                          <div class="div-anos-encontrados">
                          
                          </div>
                      </div>  
                     
                        
                  </div>
                </div>
              </div>
              
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Definir Indicadores
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                     
                     <div class="form-group form-inline" >
                          <label for="sel1">X : </label>
                          <select class="form-control" id="select-x"style="width:75%;">
                              
                          </select>
                      </div>
                    <div class="form-group form-inline" >
                          <label for="sel1">Y : </label>
                          <select class="form-control" id="select-y"style="width:75%;">
                              
                          </select>
                      </div>
                  </div>
                 
                </div>
              </div>
              
      </div>
      
      <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
  </div>
    
    <form>
      {{ csrf_field() }}
    </form>
    
    <!-- Modal -->
  <div class="modal fade" id="regras" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Regras para análise no Motion Chart  </h3>
        </div>
        <div class="modal-body">
         
          <p>A primeira coluna do arquivo CSV deve conter o nome do estado. As demais colunas deveram conter um traço após a última palavra e posteriormente o ano a que ela se refere, tudo sem espaço. Por exemplo se a coluna chama População e o ano que a representa é 1990, a coluna deverá ficar assim "população-1990". </p>
          <h3>Faça download do template:</h3>
          <p>
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
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["motionchart"]});
      //google.setOnLoadCallback(drawChart);
      
      function drawChart(dados,indicadores) {
  
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Fruit');
        data.addColumn('number', 'Date');
        if(indicadores != undefined){
        for(i = 0; i < indicadores.length; i++){
          data.addColumn('number', indicadores[i]);
      }
        }

        else{
        data.addColumn('number', 'Lucro');
        data.addColumn('number', 'Despesas');
        data.addColumn('number', 'Venda');
        }
    for(i = 0; i < dados.length; i++){
        data.addRow(dados[i]);
    }

    
        var chart = new google.visualization.MotionChart(document.getElementById('chart_div'));

        chart.draw(data, {width: 780, height:500});
      }


      var arrIndicadores = [];
      var arrAnos        = []; 
      

      
      $(document).ready(function(){

        $('#accordion').collapse({
        toggle: false
      })
      
        $("#upload-file").change(function(){
          $("#form-file").trigger('submit');
        });

      $( "#form-file" ).submit(function(e) {
        
        e.preventDefault();
          
        jQuery.ajax({
                url: "/upload/motion",
                type: "POST",
                dataType: "JSON",
                data: new FormData( this ),
                processData: false,
                contentType: false
                
            }).done(function(data){
                var str = "";
                var strIndicadoresEncontrados = "";
                var strAnos = "";
                var countIndicadores = 0;
                var countAnos = 0;

                
                $(data.indicadores).each(function (key, value) {
                    arrIndicadores[countIndicadores] = value;
                    countIndicadores++;
                
            str += '<option value="' + value + '">' + value + '</option>';
            strIndicadoresEncontrados += '<div style="margin-bottom:10px"><span class="label label-success" style="font-size:12px">'+ value + '</span></div> ';

                })
        $("#indicadores-encontrados").show();
        $(".div-indicadores-encontrados").html(strIndicadoresEncontrados);
                $('#select-x').html(str);
                $('#select-y').html(str);

                $(data.anos).each(function (key, value) {
                      arrAnos[countAnos] = value;
                      countAnos++;
              strAnos += '<span class="label label-primary" style="font-size:14px">'+ value + '</span>  ';
                })
                $("#anos-encontrados").show();
        $(".div-anos-encontrados").html(strAnos);
        
                str = "";
            }).fail(function(){
                
                alert("Fail send data");
            });
      });   
  
      $("#form-processamento").submit(function(e){
      e.preventDefault();

      //buscar todos os dados do form
      var x = $( "#select-x option:selected" ).val();
      var y = $("#select-y option:selected").val();
  

      jQuery.ajax({
                url: "/motion/processamento",
                type: "POST",
                dataType: "JSON",
                data: {'indicadores': arrIndicadores,
            'anos':arrAnos,
            'x': x,
            'y': y,
            '_token':$( "input[name='_token']" ).val()
            }

                
            }).done(function(dados){
                
              drawChart(dados.informacoes,dados.indicadores);
            }).fail(function(){
                
                alert("Fail send data");
            });
      
      
    })
      
        jQuery.ajax({
              url: "/motion/simula",
              type: "POST",
              dataType: "JSON", 
          data:{'_token':$( "input[name='_token']" ).val()},
        success:function(dados){
              //console.log(data.length);
            //dados = data[0];
            //console.log(data[0]); 
            drawChart(dados);
          }

              
          });

          })
    </script>
  </body>
</html>