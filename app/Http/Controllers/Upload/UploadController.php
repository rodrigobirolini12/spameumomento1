<?php
namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Validator;
use Cache;
use Crypt;
use Auth;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function postIndex(Request $request)
    {
        $file = $request->file('file');
        
        if ($request->hasFile('file') && $file->isValid()) {
            $file->move('assets/uploads', "dados_usuario.csv");
        }
    }

    public function postAtributos(Request $request)
    {
        $attributes = array();
        
        $file = $request->file('file');
        if ($request->hasFile('file') && $file->isValid()) {
            $file->move('assets/uploads', "dados_analise.csv");
            
            // lendo atributos
            $row = 1;
            if (($handle = fopen("assets/uploads/dados_analise.csv", "r")) !== FALSE) {
                $data = fgetcsv($handle, 1000, ";");
                
                foreach ($data as $d => $v) {
                    #$data[$d] = utf8_encode($v);
                    $attributes[$d+2] = utf8_encode($v);
                }
                array_shift( $attributes);   
                echo json_encode(array('atributos' => $attributes, 'countColunas' => count($attributes)));
                    
            }
        else{
            echo 'fail';
        }
      }
    }

   

    public function postMotion(Request $request)
    {
        $attributes = array();
    
        $file = $request->file('file');
        if ($request->hasFile('file') && $file->isValid()) {
            $file->move('assets/uploads', "dados_motion.csv");
    
            // lendo atributos
            $row = 1;
            if (($handle = fopen("assets/uploads/dados_motion.csv", "r")) !== FALSE) {
                $data = fgetcsv($handle, 1000, ";");
                
                foreach ($data as $d => $v) {
                    #$data[$d] = utf8_encode($v);
                    $attributes[$d+2] = utf8_encode($v);
                }
               array_shift( $attributes);
               
               $indicadores = array();
               $anos = array();
               #pegando indicadores
               foreach($attributes as $key => $value){
                   $recIndicador = explode("-",$value)[0];
                   $recAno = explode("-",$value)[1];
                                          
                if(!in_array($recIndicador, $indicadores)){
                    $indicadores[] = $recIndicador;
                }
                if(!in_array($recAno, $anos)){
                    $anos[] = $recAno;
                }
           
                   
               }
                echo json_encode(array("indicadores" =>$indicadores, "anos" => $anos));
    
            }
            else{
                echo 'fail';
            }
        }
    }

    public function getTeste()
    {
      
        
        echo json_encode($arr);
        exit();
        
        // $handle = fopen("http://laravel.dev/assets/uploads/dados_usuario.xlsx", "r");
        $row = 1;
        if (($handle = fopen("http://laravel.dev/assets/uploads/dados_analise.csv", "r")) !== FALSE) {
            $data = fgetcsv($handle, 1000, ";");
            
            foreach ($data as $d => $v){
                $data[$d] = utf8_encode($v);
            }
            
             echo json_encode($data);
            
            }
            else{
                echo 'fail';
            fclose($handle);
        }
    }
}
