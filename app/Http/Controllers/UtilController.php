<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
/**
 * Esta classe contem metodos que podem ser usados em várias partes da aplicação
 *
 * @package  App\Http\Controllers;
 * @author   Rodrigo B. Vaz <rodrigo_birolini1@hotmail.com>
 * @version  $Revision: 1.0 $
 * @access   public
 * @since    24/10/2016
 */
class UtilController extends Controller
{
    
    /**
     * Determina menor valor de um array
     * 
     * @param array $dadosAnalise 
     * @return array
     */
    public static function obterValorMinimoArray($dadosAnalise){
    
        #determina  valor mais baixo
        $minVal = 400000000000000;
        foreach($dadosAnalise as $d){
            if($d < $minVal ){
                $minVal = $d;
            }
        }
    
        return $minVal;
    }
    
    /**
     * Determina maior valor de um array
     *
     * @param array $dadosAnalise
     * @return array
     */
    public static function obterValorMaximoArray($dadosAnalise){
        #determina valor mais alto
        $maxVal = 0;
        foreach($dadosAnalise as $d){
            if($d > $maxVal ){
                $maxVal = $d;
            }
        }
    
        return $maxVal;
    }
    
    /**
     * funão responsavel por excluir valores que nao se encaixam no minimo e maximo definido
     *
     * @param array $dadosAnalise
     * @param int|float $min  - valor minimo
     * @param int|float $max  - valor maximo
     * @return array
     */
    public static function trataMinMaxArray($dadosAnalise, $min, $max){
         
    
        foreach ($dadosAnalise as $key => $value){
    
            if($value < $min || $value > $max){
                unset($dadosAnalise[$key]);
            }
        }#end foreach
        return $dadosAnalise;
    
    }
    
    
    /**
     * incrementa 1 de acordo com as casas decimais
     *
     * @param int|float $casasDecimais  - quantidade de casas decimais
     * @return int|float
     * */
     public static function increments($casasDecimais){
        switch ($casasDecimais) {
            case 0:
                $numero =  1;
                break;
            case 1:
                $numero = 0.1;
                break;
            case 2:
                $numero = 0.01;
                break;
             case 3:
                $numero = 0.001;
                break;   
            case 4:
                $numero =  0.001;
                break;
            case 5:
                $numero =  0.0001;
                break;
            case 6:
                $numero = 0.00001;
                break;
            case 7:
                $numero = 0.000001;
                break;
            case 8:
                $numero = 0.0000001;
                break;
            case 8:
                $numero = 0.00000001;
                break;
            case 8:
                $numero = 0.000000001;
                break;
    
        }
        return $numero;
    }#end incrementes
    
    public static function geraLegenda($intervalos, $arrVariacaoCores){
        $strLegenda  = "";
        $strLegenda  = "<b>Legenda</b><br><span style='background-color:rgb(224,224,224,1)' class='gpmCaixaCor'></span><span class='spanLegenda'>Sem Dados</span></br>
            ";
        foreach ($intervalos as $key => $value){
            $strLegenda .=    "<span style='background-color:".$arrVariacaoCores[$key]."' class='gpmCaixaCor'></span><span class='spanLegenda'>".$value['min']."-".$value["max"]."</span></br>";
        }#end foreach intervalo
        
        return $strLegenda;
    }

}
