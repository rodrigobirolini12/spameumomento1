<?php
namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Validator;
use Cache;
use Crypt;
use Auth;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getDownload()
    {
      
        $numeroTemplate = $_GET['template'];
        
        if($numeroTemplate == 1){
            $arquivo = "assets/templates/template.csv";
        }else if($numeroTemplate == 2){
            $arquivo = "assets/templates/templateMapaDinamico.csv";
        }else if($numeroTemplate == 3){
            $arquivo = "assets/templates/motionChartFinal.csv";
        }
        $download_size = filesize($arquivo);
        
        $filename = basename($arquivo);
        header ("Content-type: application/x-msdownload");
        header("Content-Length: $download_size");
        header ("Content-disposition: attachment; filename=$filename;");
        header ("Content-Description: Download File");
        header("Content-Type: application/force-download");
        readfile("$arquivo");
    
        
}
}