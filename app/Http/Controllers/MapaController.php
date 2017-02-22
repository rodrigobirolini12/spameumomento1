<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\ProcessamentoController;

class MapaController extends Controller
{
  
    const COLOR_DEFAULT = "rgb(224,224,224,1)";
    
    public function getGeochart()
    {
        return view('mapas.geochart');
    }
    
   
    /**
     * Exibe pagina pricipal do mala
     */
    public function getInit(){

        return view('mapas.index');
    }
    
    public function getSpa(){
    
        return view('spa.index');
    }
    
    public function getContato(){
    
        return view('spa.contato');
    }
    
    public function getGaleria(){
    
        return view('spa.galeria');
    }
    
    public function getInicio(){
    
        return view('spa.inicio');
    }
    
    public function getServicos(){
    
          $servico = 'nothing';
        
       return view('spa.servicos', compact('servico'));
    }
    
    public function postServicos(Request $request){
        
        
        
            $servico = ($request->input('servico') != '')?$request->input('servico'):'nothing';
        
       return view('spa.servicos', compact('servico'));
    }
    
    public function getClinica(){
    
        return view('spa.clinica');
    }
    
    public function getTemplate(){
    
        return view('spa.template');
    }
    
    public function getSpaindex(){
    
        return view('spa.index');
    }
    
    /**
     * Exibe pagina pricipal dos minicipios
     * 
     * Demonstração da lentidao em carregar mapa com todos os municippios
     */
    public function getMunicipios(){
       return view('mapas.municipios');
    }
    
    
    /**
     * Exibe pagina pricipal de uma cidade
     * 
     * Demonstração de correção do kml padrao
     */
    public function getCidade(){
        return view('mapas.cidade');
    }
    
  
    /**
     * Analisa metodo de processamento e delega para o metodo correspondente
     *
     * @param Request $request conten todos os dados vindo da requisição
     * @return void
     */
    public function postProcessamento(Request $request){
       
       # ProcessamentoController::teste();
        $processamento = new ProcessamentoController($request);
        
       if($request->input('metodo') == 1){
            $processamento->processaJenks();
        } else if($request->input('metodo') == 2){
          $processamento->processaIntervalosIguais();
       }else if($request->input('metodo') == 3){
           #self::processamentoQuantis($request);
           $processamento->processaQuantis();
       }
       else if($request->input('metodo') == 4){
           #self::processamentoIntervaloManual($request);
           $processamento->processaIntervaloManual();
       }
    }#END FUNCTION
    
   

    public function postBuscaDadosAtributo(Request $request){
        
        
        $row = 1;
        #contador utilizado para pegar o atributo a ser analisado
        $countAtributo = 1;
        if (($handle = fopen("http://analisedadosbeta.herokuapp.com/assets/uploads/dados_analise.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $quantidadeDeColunas = count($data);
        
                if($countAtributo == 1){
                    $atributo = utf8_encode($data[$request->input('atributoAnalise')+1]);
                    $countAtributo++;
                }
        
                $row++;
        
                #$dadosArquivo[$data[0]] = array('dado_analise' => utf8_encode($data[$this->request->input('atributoAnalise')+1]),'classe' => '', 'cores' =>'') ;
                #seleciona somente os dados a serem analisados
                $dadosDefineIntervalos[$data[0]] = utf8_encode($data[$request->input('atributoAnalise')+1]);
        
            }
        
        }
        array_shift($dadosDefineIntervalos);
        sort($dadosDefineIntervalos);
        echo json_encode(array('dadosAnalise' => $dadosDefineIntervalos));
        
    }
    
    /**
     * funão responsavel por excluir valores que nao se encaixam no minimo e maximo definido
     *
     * @param array $dadosAnalise
     * @param int|float $min  - valor minimo
     * @param int|float $max  - valor maximo
     * @return array
     */
    public function postElimina(Request $request){
         
        $arrDadosAnalise = $request->input('dadosAnalise');
        
        #define minimo e maximo
        $minimo =$request->input('minimo');
        $maximo =$request->input('maximo');
        $minimo = (isset($minimo) && $minimo != "")?$minimo:UtilController::obterValorMinimoArray($arrDadosAnalise);
        $maximo = (isset($maximo) && $maximo != "")?$maximo:UtilController::obterValorMaximoArray($arrDadosAnalise);
        
        foreach ($arrDadosAnalise as $key => $value){
    
            if($value < $minimo || $value > $maximo){
                unset($arrDadosAnalise[$key]);
            }
        }#end foreach
        echo json_encode(array('dadosAnalise' =>$arrDadosAnalise));
    
    }
    
    
}
