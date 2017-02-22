<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilController;
use DB;
/**
 * Esta classe cria os intervalos de acordo com o metodo e dados fornecidos
 *
 * Métodos disponiveis
 * Quantis
 *
 * @package  App\Http\Controllers;
 * @author   Rodrigo B. Vaz <rodrigo_birolini1@hotmail.com>
 * @version  $Revision: 1.0 $
 * @access   public
 * @since    24/10/2016
 */
class IntervalosController extends Controller
{
    

    /**
     * Determina intervalos para intervalos fornecidos por jenks no front-end da aplicacao
     *
     * @param array $arrayClasses conten as classes fornecidas pelo algoritmo na parte front-end 
     * @return array
     */
    public function byJenks($arrayClasses,$decimals){
        

        $arrIntervalos = array();
        $j =1;
        for($i = count($arrayClasses)-1; $i >= 1; $i--){
            if($i == count($arrayClasses)-1){
            $arrIntervalos[1] = array('min' =>  $arrayClasses[$i-1], 'max' => $arrayClasses[$i]);
            }else{
                $arrIntervalos[++$j] = array('min' =>  $arrayClasses[$i-1], 'max' => $arrayClasses[$i]-UtilController::increments($decimals));
            }
            
        }
       
        return $arrIntervalos;    
    }#end jenks


    /**
     * Determina intervalos para intervalos fornecidos por jenks no front-end da aplicacao
     *
     * @param array $arrayClasses conten as classes fornecidas pelo algoritmo na parte front-end
     * @return array
     */
    public function byQuantis($arrayClasses,$decimals){
    
    
        $arrIntervalos = array();
        $j =1;
        for($i = count($arrayClasses)-1; $i >= 1; $i--){
            if($i == count($arrayClasses)-1){
                $arrIntervalos[1] = array('min' =>  $arrayClasses[$i-1], 'max' => $arrayClasses[$i]);
            }else{
                $arrIntervalos[++$j] = array('min' =>  $arrayClasses[$i-1], 'max' => $arrayClasses[$i]-UtilController::increments($decimals));
            }
    
        }
         
        return $arrIntervalos;
    }#end jenks
    
    
    /**
     * Determina intervalos para intervalos fornecidos manualmente
     *
     * @param array $strIntervalos string contendo os intervalos fornecidos no padrao (1-25;26-78;79-100)
     * @return array
     */
    public function byIntervaloManual($strIntervalos){
    
        $arrIntervalos = array();
        $intervaloExplode = explode(';', $strIntervalos);
        $quantidadeClasses = count($intervaloExplode);
    
        foreach ($intervaloExplode as $i){
            $iExplode = explode('-', $i);
            $arrIntervalos[$quantidadeClasses--] = array('min' => $iExplode[0], 'max' => $iExplode[1]);
        }
    
        return $arrIntervalos;
    }#end intervaloManual
    
    /**
     * Determina intervalos iguais
     *
     * @param array $dadosAmalise
     * @param array $casasDecimais
     * @param array $numeroClasses
     * @return array
     */
    public function byIntervalosIguais($dadosAnalise,$casasDecimais, $numeroClasses){
    
        # echo "<pre>";
    
        #determina L -> valor mais baixo
        $minVal = 400000000000000;
        foreach($dadosAnalise as $d){
            if($d < $minVal ){
                $minVal = $d;
            }
        }
    
        #determina H -> valor mais alto
        $maxVal = 0;
        foreach($dadosAnalise as $d){
            if($d > $maxVal ){
                $maxVal = $d;
            }
        }
    
        #calcula amplitude ->R
        $amplitude = $maxVal - $minVal;
    
    
        if($casasDecimais == 0){
            #calcula intervalo de classe h
            $intervaloClasse =(integer) $amplitude/$numeroClasses;
            $intervaloClasse =(integer)$intervaloClasse;
        }
        else{
            #calcula intervalo de classe h
            $intervaloClasse = $amplitude/$numeroClasses;
            $intervaloClasse = round($intervaloClasse,$casasDecimais);
        }
        $intervalos = array();$limiteSuperior = 0;
        #definindo intervalos
        for ($count = $numeroClasses; $count >= 1; $count--) {
    
    
            if($count == $numeroClasses){
                $intervalos[$numeroClasses] = array('min' => $minVal,'max' => $minVal+$intervaloClasse);
                $limiteSuperior = $minVal+$intervaloClasse;
            }else if($count == 1){
                $intervalos[$count] = array('min' => $limiteSuperior,'max' => $maxVal);
    
    
            }
            else{
                $intervalos[$count] = array('min' => $limiteSuperior,'max' => $limiteSuperior+$intervaloClasse);
                $limiteSuperior = $limiteSuperior+$intervaloClasse;
            }
    
        }
    
        return $intervalos;
    
    }//end intervalosIguais


    
    
    
}
