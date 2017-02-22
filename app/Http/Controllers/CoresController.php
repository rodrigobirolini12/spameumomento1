<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
/**
 * Variancia de cores para legendas
 *
 * @package  App\Http\Controllers;
 * @author   Rodrigo B. Vaz <rodrigo_birolini1@hotmail.com>
 * @version  $Revision: 1.0 $
 * @access   public
 * @since    24/10/2016
 */
class CoresController extends Controller
{
    
    public function retornaVariacaoCoresRgb($cor, $classe = 9){
    
        if($cor == "verde"){return array(1 => "rgb(0,68,27)",2 => "rgb(0,109,44)",3 => "rgb(35,139,69)",4 => "rgb(65,171,93)",5 => "rgb(116,196,118)",6 => "rgb(161,217,155)",7 => "rgb(199,233,192)",8 => "rgb(229,245,224)",9 => "rgb(247,252,245)");}
        else if($cor == "azul"){return array(
            1 => "rgb(8,48,107)",
            2 => "rgb(8,81,156)",
            3 => "rgb(33,113,181)",
            4 => "rgb(66,146,198)",
            5 => "rgb(107,174,214)",
            6 => "rgb(158,202,225)",
            7 => "rgb(198,219,239)",
            8 => "rgb(222,235,247)",
            9 => "rgb(247,251,255)"
    
        );
        }
    
        else if($cor == "vermelho"){return array(
            1 => "rgb(103,0,13)",
            2 => "rgb(165,15,21)",
            3 => "rgb(203,24,29)",
            4 => "rgb(239,59,44)",
            5 => "rgb(251,106,74)",
            6 => "rgb(252,146,114)",
            7 => "rgb(252,187,161)",
            8 => "rgb(252,187,161)",
            9 => "rgb(255,245,240)"
    
        );}
        else if($cor == "espectral"){return array(
            1 => "rgb(50,136,189)",
            2 => "rgb(102,194,165)",
            3 => "rgb(171,221,164)",
            4 => "rgb(230,245,152)",
            5 => "rgb(255,255,191)",
            6 => "rgb(254,224,139)",
            7 => "rgb(253,174,97)",
            8 => "rgb(244,109,67)",
            9 => "rgb(213,62,79)"
    
        );}
        
        
    
        else if($cor == "vermelhoAzul" && $classe == 3){return array(
            1 => "rgb(103,169,207)",
            2 => "rgb(247,247,247)",
            3 => "rgb(239,138,98)",
            4 => "rgb(247,247,247)",
            5 => "rgb(247,247,247)",
            6 => "rgb(247,247,247)",
            7 => "rgb(247,247,247)",
            8 => "rgb(247,247,247)",
            9 => "rgb(247,247,247)"
           
        );}
        
        else if($cor == "vermelhoAzul" && $classe == 4){return array(
            1 => "rgb(5,113,176)",
            2 => "rgb(146,197,222)",
            3 => "rgb(244,165,130)",
            4 => "rgb(202,0,32)",
            5 => "rgb(247,247,247)",
            6 => "rgb(247,247,247)",
            7 => "rgb(247,247,247)",
            8 => "rgb(247,247,247)",
            9 => "rgb(247,247,247)"
        
        );}
   
        else if($cor == "vermelhoAzul" && $classe == 5){return array(
            1 => "rgb(5,113,176)",
            2 => "rgb(146,197,222)",
            3 => "rgb(247,247,247)",
            4 => "rgb(244,165,130)",
            5 => "rgb(202,0,32)",
            6 => "rgb(202,0,32)",
            7 => "rgb(202,0,32)",
            8 => "rgb(202,0,32)",
            9 => "rgb(202,0,32)"
        
        );}
    
        else if($cor == "vermelhoAzul" && $classe == 6){return array(
            1 => "rgb(33,102,172)",
            2 => "rgb(103,169,207)",
            3 => "rgb(209,229,240)",
            4 => "rgb(253,219,199)",
            5 => "rgb(239,138,98)",
            6 => "rgb(178,24,43)",
            7 => "rgb(202,0,32)",
            8 => "rgb(202,0,32)",
            9 => "rgb(202,0,32)",
        
        );}

        else if($cor == "vermelhoAzul" && $classe == 7){return array(
            1 => "rgb(33,102,172)",
            2 => "rgb(03,169,207)",
            3 => "rgb(209,229,240)",
            4 => "rgb(247,247,247)",
            5 => "rgb(253,219,199)",
            6 => "rgb(239,138,98)",
            7 => "rgb(178,24,43)",
            8 => "rgb(202,0,32)",
            9 => "rgb(202,0,32)",
        );}
        
        else if($cor == "vermelhoAzul" && $classe == 8){return array(
            1 => "rgb(33,102,172)",
            2 => "rgb(67,147,195)",
            3 => "rgb(146,197,222)",
            4 => "rgb(209,229,240)",
            5 => "rgb(253,219,199)",
            6 => "rgb(244,165,130)",
            7 => "rgb(214,96,77)",
            8 => "rgb(178,24,43)",
            9 => "rgb(202,0,32)"
        
        );}
   
        else if($cor == "vermelhoAzul" && $classe == 9){return array(
            1 => "rgb(33,102,172)",
            2 => "rgb(67,147,195)",
            3 => "rgb(146,197,222)",
            4 => "rgb(209,229,240)",
            5 => "rgb(253,219,199)",
            6 => "rgb(244,165,130)",
            7 => "rgb(214,96,77)",
            8 => "rgb(214,96,77)",
            9 => "rgb(178,24,43)"
        
        );}
        
        else if($cor == "diversas"){return array(
            1 => "rgb(228,26,28)",
            2 => "rgb(55,126,184)",
            3 => "rgb(77,175,74)",
            4 => "rgb(152,78,163)",
            5 => "rgb(255,127,0)",
            6 => "rgb(255,255,51)",
            7 => "rgb(166,86,40)",
            8 => "rgb(247,129,191)",
            9 => "rgb(153,153,153)"
        
        );}
}

}
