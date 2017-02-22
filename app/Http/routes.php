<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::controller('/', 'Site\HomeController@index');

    Route::group(['prefix' => 'admin', 'middleware' => 'init.middleware'], function () {
        Route::get('users', function ()    {
            return 'hey';
        });
    });
        
        // Display a form to create a blog post...
        Route::get('post/create', 'PostController@create');
        // Store a new blog post...
        Route::post('post', 'PostController@store');
    
        
        Route::controller('users', 'UserController');   
        Route::controller('collection', 'CollectionController');
        
        
        
        #trabalhando com sessoes
        Route::get('sessao/gravar', function ()    {
            echo    'Gravando sessao';
            session(['msg' =>'gravando sessao no laravel']);
           // return 'hey';
        });
        Route::get('sessao/exibir', function (){
            $msg = session('msg');
            return $msg;
       });
        
        
        #eloquent
            Route::get('eloquent', function (){
                ##dd(App\Models\Painel\Carro::get());
                dd(App\Models\Painel\Carro::first());
            });
            
                #relacionamentos
                Route::get('relacionamentos', function (){
                    ##dd(App\Models\Painel\Carro::get());
                    #dd(App\Models\Painel\Carro::find(1)->getChassi()->get()->toArray());]
                    dd(App\Models\Painel\Carro::find(1)->getMarca()->get()->toArray());
                });
            
                #collection
                Route::get('collection', function (){
                    ##dd(App\Models\Painel\Carro::get());
                    #dd(App\Models\Painel\Carro::get()->toArray());
                    dd(App\Models\Painel\Carro::get()->toJson());
                });
        
        #query-builder
            Route::get('query-builder', function (){
                #dd(DB::table('carros')->get());
                #dd(DB::table('carros')->first());
                #dd(DB::table('carros')->select('id','nome','placa')->first());
                #dd(DB::table('carros')->lists('placa','id','nome'));
                #dd(DB::table('carros')->where('id',"=",2)->count());
                
                dd(
                    DB::table('carros')
                        ->join('carro_marcas','carro_marcas.id','=','carros.id_marca')
                        ->select('carros.nome','carros.placa','carro_marcas.marca')
                        ->get()
                    );
            });
        
        #emails
            Route::get('email', function (){
                
                Mail::raw('msg texto puro',function($m){
                        
                    $m->to('rodrigo_birolini1@hotmail.com','Rodrigo')->subject('teste no laravel');
                });
            });
        
        Route::get('produtos', 'ProdutoController@index');
        Route::controller('/mapa', 'MapaController');
        Route::controller('/motion', 'MotionController');
        Route::controller('/upload', 'Upload\UploadController');
        Route::controller('/template', 'Template\TemplateController');
        
        //carros routes
        Route::group(['prefix' =>'painel' , 'middleware' => 'auth'] , function(){
            #Route::get('carros', 'Painel\CarrosController@index');
            #Route::get('carros/adicionar', 'CarrosController@adicionar');
            #Route::post('carros/adicionarBd', 'CarrosController@adicionarBd');
            #Route::post('carros/updatebd/{id}', 'CarrosController@updatebd');
            #Route::get('carros/editar/{id}', 'CarrosController@editar');
            #Route::get('carros/deletar/{id}', 'CarrosController@deletar');
            #Route::get('carros/listar', 'CarrosController@listarCarrosCache');
            #Route::post('carros/adicionarAjax', 'CarrosController@adicionarViaAjax');
            Route::controller('/alunos', 'Painel\AlunoController');
            
            Route::controller('/', 'Painel\PainelController');
        });
            
           
            Route::auth();
            Route::controller('/', 'Site\HomeController');
