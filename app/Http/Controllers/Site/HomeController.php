<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public  function getIndex(){
        return view('site.home.index');
    }
    public  function getLogin(){
    
    }
    
    public  function getSobre(){
        return view('site.sobre.index');
    }
    
    public  function getContato(){
        return 'pagina de contato';
    }
    
    
}
