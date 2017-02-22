<?php

namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Models\Painel\Carro;
use Validator;
use Cache;
use Crypt;
use Auth;
use App\Models\Painel\CarroMarcas;
use App\Http\Controllers\Controller;

class CarrosController extends Controller
{
    
    private $carro;
    private $request;
    
    
    public function __construct(Carro $carro, Request $request){
        
        $this->carro = $carro;
        $this->request = $request;
        
    }

    public  function index(){
       
        #dd(CarroMarcas::get());
        #DB::table('carros')->get();
        $marcas = CarroMarcas::get();
        $carros = Carro::paginate(50);
        return view('painel.carros.index', compact('carros','marcas'));
    }
    
    public function adicionar(){
        $marcas = CarroMarcas::get();
        return view('painel.carros.create-edit', compact('marcas'));
    }
    
    public function adicionarBd(Request $request)
    {   
       /*  $carro = new Carro(); */
        /* $carro->nome = $request->input('carro');
        $carro->placa = $request->input('placa');
        $carro->save(); */
        
        $dadosForm = $request->all();
        
       /*  $rules = [
            
            'nome' => 'required|min:3|max:100',
            'placa' => 'required|min:7|max:7'
         ];  */
        
        $validator = Validator::make($dadosForm,Carro::$rules );
       
        
        if($validator->fails()){
            return redirect('carros/adicionar')->withErrors($validator)->withInput();
        }
        else{
            Carro::create($dadosForm);
            return redirect('carros')->withInput();
        }
        
        
        
        /* dd($request->input('carro'));
        return 'Adicionando um novo carro'; */
    }
    
    public function adicionarViaAjax(Request $request)
    {
        /*  $carro = new Carro(); */
        /* $carro->nome = $request->input('carro');
         $carro->placa = $request->input('placa');
         $carro->save(); */
    
        $dadosForm = $request->all();
    
        /*  $rules = [
    
        'nome' => 'required|min:3|max:100',
        'placa' => 'required|min:7|max:7'
        ];  */
    
        $validator = Validator::make($dadosForm,Carro::$rules );
         
    
        if($validator->fails()){
            $messages = $validator->messages();
            
            $displayErrors = "";
            
            foreach($messages->all() as $error){
                $displayErrors .= $error;
                return $displayErrors;
            }
        }
        else{
            Carro::create($dadosForm);
            return 1;
        }
    
    
    
        /* dd($request->input('carro'));
         return 'Adicionando um novo carro'; */
    }
    
    public function editar($idCarro){
        $carro = Carro::find($idCarro);
        $marcas = CarroMarcas::get();
        #dd($carro);
        #return view('painel.carros.create-edit',['idCarro' =>$idCarro,'nome' => $carro->nome,'placa' => $carro->placa]);
        return view('painel.carros.create-edit',compact('carro','marcas'));
    }
    
    public function updatebd(Request $request, $idCarro){
        $dadosForm = $request->except('_token');
        Carro::where('id',$idCarro)->update($dadosForm);
        return redirect('carros');
        
    }
    
    public function deletar($idCarro){
        
        $carro = Carro::find($idCarro);
        $carro->delete();
        return redirect('carros');
    }
    
    
    public function listarCarrosCache(){
        //Cache::put('carros' , Carro::all(),3);
        //$carros = Cache::get('carros' , 'Não existe carros');
        //return $carros;
        
        $carros = Cache::remember('carros',3, function(){
               return Carro::all(); 
        });
        
        $titulo =    \Illuminate\Support\Facades\Crypt::encrypt('Cache carros');
        
        return view('painel.carros.cache', compact('carros','titulo'));
    }
    
    
}
