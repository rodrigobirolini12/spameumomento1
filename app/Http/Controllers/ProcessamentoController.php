<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\IntervalosController;
use App\Http\Controllers\CoresController;
use DB;

/**
 * Responsavel por fazer todo o processamento referente aos metodos dísponiveis de analise
 *
 * Algumas operações:
 * modificação do kmlDefault (inclusao de cores, inclusao de dados)
 *
 * @package  App\Http\Controllers;
 * @author   Rodrigo B. Vaz <rodrigo_birolini1@hotmail.com>
 * @version  $Revision: 1.0 $
 * @access   public
 * @since    24/10/2016
 */
class ProcessamentoController extends Controller
{
    
    public $kmlDefault = ""; 
    public $intervalos = "";
    public $varianciaCor = "";
    const COLOR_DEFAULT = "rgb(224,224,224,1)";
    
    /**
     * @var array $dadosArquivo array multidimensional onde key é o codigo do estado e value é um array
     * contendo o dado a ser analisado buscado no arquivo csv, classe em que o dado pertcence e sua respectiva cor associada 
     */
    public $dadosArquivo = array();
    
    /**
     * @var array $dadosArquivo array contendo somente os dados de analise que serao utilizados para definir as classes
     * e seus respectivos tamanhos 
     */
    public $dadosDefineIntervalos = array();
    
    /** @var null|Request armazena todos os dados da requisicao */
    public $request = "";
    
    /** @var null|String armazena o que está sendo analisado */
    public $atributo = "";

    /** @var null|String armazena o que está sendo analisado */
    public $nomeMapa = "";

    
    /* contrutor */
    public function __construct(Request $request ){
        $this->request = $request;
        $this->kmlDefault = simplexml_load_file("/app/app/Http/Controllers/kml-default-with-description.kml");
        $this->intervalos = new IntervalosController();
        $this->varianciaCor = new CoresController();
        $this->nomeMapa  = rand();    

    }
    /**
     * Processa o método metodo matematico jenks
     *
     * @param Request $request conten todos os dados vindo da requisição
     * @return void
     */
    public  function processaJenks()
    {
        #configura cores no kml padrao
        self::setCoresKmlDefault();
        #obten dados do arquivos e dados utilizados para definir intervalos
        self::getDadosArquivosAndGetDadosDefineIntervalo($this->dadosArquivo, $this->dadosDefineIntervalos);
        #orderna
        sort($this->dadosDefineIntervalos);
        #define minimo e maximo
        $minimo =$this->request->input('minimo');
        $maximo =$this->request->input('maximo');
        $minimo = (isset($minimo) && $minimo != "")?$minimo:UtilController::obterValorMinimoArray($this->dadosDefineIntervalos);
        $maximo = (isset($maximo) && $maximo != "")?$maximo:UtilController::obterValorMaximoArray($this->dadosDefineIntervalos);
        #remove dados respoeitando os limites de minimo e maximo fornecidos
        $this->dadosDefineIntervalos = UtilController::trataMinMaxArray($this->dadosDefineIntervalos, $minimo, $maximo);
        sort($this->dadosDefineIntervalos);
        #determina intervalos
        $intervalos =  $this->intervalos->byJenks($this->request->input('intervaloJenks'),$this->request->input('casasDecimais')); 
        #$intervalos = array_reverse($intervalos,TRUE);
        
        #vinculo de classes ao estado
        self::vinculaClassesEstado($this->dadosArquivo, $intervalos, $minimo, $maximo);
        #fecha kml
        $this->kmlDefault->asXML("/app/public/assets/kml/".$this->nomeMapa.".kml");
        #criando legenda
        $arrVariacaoCores = $this->varianciaCor->retornaVariacaoCoresRgb($this->request->input('cor'),$this->request->input('classe'));
        #$intervalos = array_reverse($intervalos,TRUE);
        $intervalos = array_reverse($intervalos,TRUE);
        $legenda =  UtilController::geraLegenda($intervalos, $arrVariacaoCores);
        $tempoAtualizacao = $this->request->input('tempoAtualizacao');
        $titulo = (isset($tempoAtualizacao) and $this->request->input('tempoAtualizacao') > 0 )?$this->request->input('titulo')." - ".$this->atributo :$this->request->input('titulo');
        echo json_encode(array("nomeMapa"=> $this->nomeMapa, "legenda" => $legenda, 'titulo' => $titulo));
    }
    
    /**
     * Processa o método metodo matematico quantis
     * 
     * @param Request $request conten todos os dados vindo da requisição
     * @return void
     */
    public  function processaQuantis()
    {
        #configura cores no kml padrao
        self::setCoresKmlDefault();
        #obten dados do arquivos e dados utilizados para definir intervalos
        self::getDadosArquivosAndGetDadosDefineIntervalo($this->dadosArquivo, $this->dadosDefineIntervalos);
        #orderna 
        sort($this->dadosDefineIntervalos);
        #define minimo e maximo
        $minimo =$this->request->input('minimo');
        $maximo =$this->request->input('maximo');
        $minimo = (isset($minimo) && $minimo != "")?$minimo:UtilController::obterValorMinimoArray($this->dadosDefineIntervalos);
        $maximo = (isset($maximo) && $maximo != "")?$maximo:UtilController::obterValorMaximoArray($this->dadosDefineIntervalos);
        #remove dados respoeitando os limites de minimo e maximo fornecidos
        $this->dadosDefineIntervalos = UtilController::trataMinMaxArray($this->dadosDefineIntervalos, $minimo, $maximo);
        sort($this->dadosDefineIntervalos);
        #determina intervalos
        $intervalos =  $this->intervalos->byQuantis($this->request->input('intervaloQuantis'),$this->request->input('casasDecimais'));
        #vinculo de classes ao estado
        self::vinculaClassesEstado($this->dadosArquivo, $intervalos, $minimo, $maximo);
        #fecha kml
        $this->kmlDefault->asXML("/app/public/assets/kml/".$this->nomeMapa.".kml");
        #criando legenda
        $arrVariacaoCores = $this->varianciaCor->retornaVariacaoCoresRgb($this->request->input('cor'),$this->request->input('classe'));
        $intervalos = array_reverse($intervalos,TRUE);
        $legenda = UtilController::geraLegenda($intervalos, $arrVariacaoCores);
        $tempoAtualizacao = $this->request->input('tempoAtualizacao');
        $titulo = (isset($tempoAtualizacao) and $this->request->input('tempoAtualizacao') > 0 )?$this->request->input('titulo')." - ".$this->atributo :$this->request->input('titulo'); 
        echo json_encode(array("nomeMapa"=> $this->nomeMapa, "legenda" => $legenda,'titulo' => $titulo));
    }
    
    
    /**
     * Processa o método metodo matematico de intervalo manual
     *
     * @return void
     */
    public function processaIntervaloManual(){

        try{
        #configura cores no kml padrao
        self::setCoresKmlDefault();
        
        #obten dados do arquivos e dados utilizados para definir intervalos
        self::getDadosArquivosAndGetDadosDefineIntervalo($this->dadosArquivo, $this->dadosDefineIntervalos);
         
        #definindo minimo e maximo
        $intervaloManual = $this->request->input('intervaloManual');
        $intervaloManualExtraido = explode(';', $intervaloManual);
        $minimo = explode('-', $intervaloManualExtraido[0])[0];
        $maximo = explode('-', $intervaloManualExtraido[count($intervaloManualExtraido)-1])[1];
        #determina intervalos
        $intervalos =  $this->intervalos->byIntervaloManual($this->request->input('intervaloManual'));
       # echo "<pre>";
       # print_r($intervalos);
        #vinculo de classes ao estado
        self::vinculaClassesEstado($this->dadosArquivo, $intervalos, $minimo, $maximo);

        #fecha kml
        $this->kmlDefault->asXML("/app/public/assets/kml/".$this->nomeMapa.".kml");
       
         #criando legenda
        $arrVariacaoCores = $this->varianciaCor->retornaVariacaoCoresRgb($this->request->input('cor'),$this->request->input('classe'));
        #$intervalos = array_reverse($intervalos,TRUE);
        $legenda = UtilController::geraLegenda($intervalos, $arrVariacaoCores);
        $tempoAtualizacao = $this->request->input('tempoAtualizacao');
        $titulo = (isset($tempoAtualizacao) and $this->request->input('tempoAtualizacao') > 0 )?$this->request->input('titulo')." - ".$this->atributo :$this->request->input('titulo');
        echo json_encode(array("nomeMapa"=> $this->nomeMapa, "legenda" => $legenda,'titulo' => $titulo));
       # echo "<pre>";
        #print_r($this->dadosArquivo);
        #criando legenda
        #$arrVariacaoCores = $this->varianciaCor->retornaVariacaoCoresRgb($this->request->input('cor'));
        #$legenda          = UtilController::geraLegenda($intervalos, $arrVariacaoCores);
        #echo json_encode(array("nomeMapa"=> $this->nomeMapa, "legenda" => $legenda));
    }catch(Exception $e){
            echo $e->getMessage();
    }
    }
    
    
    /**
     * Processa o método metodo matematico de intervalos iguais
     *
     * @return void
     */
    public function processaIntervalosIguais(){
        #configura cores no kml padrao
        self::setCoresKmlDefault();
        #obten dados do arquivos e dados utilizados para definir intervalos
        self::getDadosArquivosAndGetDadosDefineIntervalo($this->dadosArquivo, $this->dadosDefineIntervalos);
        #define minimo e maximo
        $minimo =$this->request->input('minimo');
        $maximo =$this->request->input('maximo');
        $minimo = (isset($minimo) && $minimo != "")?$minimo:UtilController::obterValorMinimoArray($this->dadosDefineIntervalos);
        $maximo = (isset($maximo) && $maximo != "")?$maximo:UtilController::obterValorMaximoArray($this->dadosDefineIntervalos);
        #remove dados respoeitando os limites de minimo e maximo fornecidos
        $this->dadosDefineIntervalos = UtilController::trataMinMaxArray($this->dadosDefineIntervalos, $minimo, $maximo);

        #determina intervalos
        $intervalos =  $this->intervalos->byIntervalosIguais($this->dadosDefineIntervalos,$this->request->input('casasDecimais'),$this->request->input('classe'));
       #vinculo de classes ao estado
        self::vinculaClassesEstado($this->dadosArquivo, $intervalos, $minimo, $maximo);
         #fecha kml
        $this->kmlDefault->asXML("/app/public/assets/kml/".$this->nomeMapa.".kml");
        #criando legenda
        $arrVariacaoCores = $this->varianciaCor->retornaVariacaoCoresRgb($this->request->input('cor'),$this->request->input('classe'));
        $legenda = UtilController::geraLegenda($intervalos, $arrVariacaoCores);
        $tempoAtualizacao = $this->request->input('tempoAtualizacao');
        $titulo = (isset($tempoAtualizacao) and $this->request->input('tempoAtualizacao') > 0 )?$this->request->input('titulo')." - ".$this->atributo :$this->request->input('titulo');
        echo json_encode(array("nomeMapa"=> $this->nomeMapa, "legenda" => $legenda,'titulo' => $titulo));
    }
    
    
    /**
     * Configuração da cor selecionada no kml padrão.
     *
     * Função responsável por setar os estilos de cores no kml padrao, por exemplo, se a cor escolhida for azul,
     * será setado no kml todas as stylesUrls relacionadas ao azul.
     *
     * @param Request $request conten todos os dados vindo da requisição
     * @return void
     */
    private function setCoresKmlDefault(){
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color1']/PolyStyle")[0]->color = $this->request->input('cores')[1];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color2']/PolyStyle")[0]->color = $this->request->input('cores')[2];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color3']/PolyStyle")[0]->color = $this->request->input('cores')[3];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color4']/PolyStyle")[0]->color = $this->request->input('cores')[4];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color5']/PolyStyle")[0]->color = $this->request->input('cores')[5];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color6']/PolyStyle")[0]->color = $this->request->input('cores')[6];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color7']/PolyStyle")[0]->color = $this->request->input('cores')[7];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color8']/PolyStyle")[0]->color = $this->request->input('cores')[8];
        $this->kmlDefault->xpath("/kml/Document/Style[@id='color9']/PolyStyle")[0]->color = $this->request->input('cores')[9];
    }
    
    /**
     * Obten dados arquivo e dados para definir os intervalos do metodo
     *
     * @param array &$dadosArquivo - ver descrição da propriedade
     * @param array &$dadosArquivo - ver descrição da propriedade
     * @return void
     */
    private function getDadosArquivosAndGetDadosDefineIntervalo(&$dadosArquivo ,  &$dadosDefineIntervalos ){
      
        $row = 1;
        #contador utilizado para pegar o atributo a ser analisado
        $countAtributo = 1;
        if (($handle = fopen("http://analisedadosbeta.herokuapp.com/assets/uploads/dados_analise.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $quantidadeDeColunas = count($data);
        
                if($countAtributo == 1){
                    $this->atributo = utf8_encode($data[$this->request->input('atributoAnalise')+1]);
                    $countAtributo++;
                }
        
                $row++;
        
                $dadosArquivo[utf8_encode($data[0])] = array('dado_analise' => utf8_encode($data[$this->request->input('atributoAnalise')+1]),'classe' => '', 'cores' =>'') ;
                #seleciona somente os dados a serem analisados
                $dadosDefineIntervalos[$data[0]] = utf8_encode($data[$this->request->input('atributoAnalise')+1]);
        
            }
            fclose ($handle);
        }

        array_shift($dadosDefineIntervalos);
    }#end function
    
    /**
     * Obten dados arquivo e dados para definir os intervalos do metodo
     *
     * @param array &$dadosArquivo - ver descrição da propriedade
     * @param array &$dadosArquivo - ver descrição da propriedade
     * @return void
     */
    private function vinculaClassesEstado(&$dadosArquivo,$intervalos,$minimo, $maximo){
       
        #vincula classes ao estado
        $count = 0;
        foreach($dadosArquivo as $key => $value){
        
            if($count == 0){
                $count++;
                continue;
            }
             
            if($value['dado_analise'] < $minimo  || $value['dado_analise'] > $maximo){
                $this->kmlDefault->xpath("/kml/Document/Folder/Placemark[@id='{$key}']")[0]->styleUrl = '#colorDefault';
                $this->kmlDefault->xpath("/kml/Document/Folder/Placemark[@id='{$key}']")[0]->description = "Fora dos limites definidos";
                continue;
            }
             
            foreach ($intervalos as $k => $v){
                 
                if($value['dado_analise'] >= $v['min'] && $value['dado_analise'] <= $v['max']){
                    $dadosArquivo[$key]['classe'] = $k;
                    $dadosArquivo[$key]['cores'] = $this->request->input('cores')[$k];
                    $this->kmlDefault->xpath("/kml/Document/Folder/Placemark[@id='{$key}']")[0]->styleUrl = '#color'.$dadosArquivo[$key]['classe'];
                    $this->kmlDefault->xpath("/kml/Document/Folder/Placemark[@id='{$key}']")[0]->description = $this->atributo.": ".$dadosArquivo[$key]['dado_analise'];
                }
            }#end foreach interno
    }
  
    
}

}