<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class MotionController extends Controller
{
 
    public function getIndex()
    {
        return view('mapas.motion');
    }
    
    
    public function getGeochart()
    {
        return view('mapas.motion');
    }
    
    
    public function postSimula()
    {
        $array =[];
        
        $array[] = array('teste1',  1991, 1000, 300,100);
        $array[] = array('teste2', 1991, 1150, 200,100);
        $array[] = array('teste3', 1991, 300,  250,100);
        $array[] = array('teste4', 	1991, 500,  600,100);
        $array[] = array('teste1', 	2000, 122,  433,100);
        $array[] = array('teste2', 2000, 676,  322,100);
        $array[] = array('teste3', 2000, 122,  322,100);
        $array[] = array('teste4', 	2000,
            565,
            700,100
        );
        
        echo json_encode($array);
    }

    public function postProcessamento(Request $request)
    {   
        $array =[];
        $attributes =[];
        $indicadores = $request->input('indicadores');
        $anos = $request->input('anos');
        $x = $request->input('x');
        $y = $request->input('y');
        
        // adiciona x e y no inicio do array
        array_unshift($indicadores, $y);
        array_unshift($indicadores, $x);
      
        
        // remove x e y do meio do array
        for ($i = 0; $i <= count($indicadores); $i ++) {
            if ($i == 0 || $i == 1) {
                continue;
            }
            
            if ($indicadores[$i] == $x || $indicadores[$i] == $y) {
                unset($indicadores[$i]);
                }
        }#end for
        
        $organizaIndiceIndicadores = array();
        foreach($indicadores as $i){
            $organizaIndiceIndicadores[] = $i;
        }
        $indicadores = $organizaIndiceIndicadores; 

        
        #buscar colunas
        $row = 1;
        if (($handle = fopen("assets/uploads/dados_motion.csv", "r")) !== FALSE) {
            $data = fgetcsv($handle, 1000, ";");
        
            foreach ($data as $d => $v) {
                #$data[$d] = utf8_encode($v);
                $attributes[$d] = utf8_encode($v);
            }
        
        $attributes = array_flip($attributes);
        
      
        #echo "<pre>";
        #print_r($attributes);
        #exit();
       # print_r($indicadores);
        #percorre anos e vai montando array
        foreach ($anos as $a){
            
            $row = 1;
            $countAtributo = 1;
            if (($handle = fopen("assets/uploads/dados_motion.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    
                  foreach($data as $key => $value){
                        $data[$key] =  utf8_encode($data[$key]);
                  }
                   
                    if($countAtributo == 1){
                        $countAtributo++;
                        continue;
                    }
                    
                    $controiArray = [];
                    $controiArray[] = $data[0];
                    $controiArray[] = (float)$a;
                    //$quantidadeDeColunas = count($data);
                    $row++;
                    //$dadosArquivo[$data[0]] = array('dado_analise' => utf8_encode($data[$this->request->input('atributoAnalise')+1]),'classe' => '', 'cores' =>'') ;
                    #seleciona somente os dados a serem analisados
                    //$dadosDefineIntervalos[$data[0]] = utf8_encode($data[$this->request->input('atributoAnalise')+1]);
                    
                    #fruta $data0 - ano - 
                    //restaura dado normal
                    $restIndicador = [];
                    foreach($indicadores as $i){
                        $restIndicador[] = $i."-".$a;
                        
                    }
                   # print_r($restIndicador);
                   # exit();
                    foreach ($restIndicador  as $r){
                        $indice = $attributes[$r];
                        $controiArray[] = (float)$data[$indice];
                       
                    }
                    $array[] = $controiArray;
                }
                
                fclose ($handle);
               
            }
            
        }
        echo json_encode(array("informacoes" =>$array, "indicadores"=> $indicadores));
    }#end function
    
}

}
