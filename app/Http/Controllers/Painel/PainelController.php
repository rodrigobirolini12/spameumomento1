<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public  function getIndex(){
        return view('painel.dashboard.index');
    }
    
    
    public function missingMethod($parameters = array()){
        return view('painel.404.index');
    }
    
}
