<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Painel\Aluno;
use App\Models\Painel\Turma;
use App\Models\Painel\Matricula;
use App\Models\Painel\Pai;
use DB;

class AlunoController extends Controller
{
          private $totalItensPorPagina = 10;  
          private $request;
          private $aluno;
          private $validator;
          private $pai;
          
          public function __construct(Request $request, Aluno $aluno,\Illuminate\Validation\Factory $validator,Pai $pai){
              $this->request = $request;
              $this->aluno   = $aluno;
              $this->validator = $validator;
              $this->pai = $pai;
              
          }
            
          public function getIndex()
          {    
              #$alunos =  $this->aluno->paginate('10');
              $alunos = $this->aluno
              ->join('matriculas', 'matriculas.id_aluno' , '=' , 'alunos.id')
              ->select('matriculas.numero', 'alunos.*')->paginate();
            
              
              $turmas = Turma::all();
              return view('painel.alunos.index',compact('alunos', 'turmas'));
          }
          
          public function postAdicionarAluno(){
              
              $dadosForm = $this->request->all();
              $validator = $this->validator->make($dadosForm,Aluno::$rules);
              
              if ($validator->fails()){
                  $messages = $validator->messages();
                  $display_errors =  "";
                  
                  foreach ($messages->all("<p>:message</p>") as $error){
                      $display_errors .= $error;
                  }#end foreach
                  
                  return $display_errors;
              } 
              $dadosForm['data_nascimento'] =\Carbon\Carbon::createFromFormat('d/m/Y',$dadosForm['data_nascimento'])->toDateString();
              $aluno =  $this->aluno->create($dadosForm);
              
              #cria matricula
              $matricula = [
                'id_aluno' => $aluno->id,
                'numero'       => $aluno->id
              ];
              
              Matricula::create($matricula);
              
              
              return 1;
              
          }
          
          
          public function getEditar($id){
                return $this->aluno->find($id)->toJson();
                
          }
          
          public function postEditar($id){
              
              $dadosForm = $this->request->all();
              $validator = $this->validator->make($dadosForm,Aluno::$rules);
              
              if ($validator->fails()){
                  $messages = $validator->messages();
                  $display_errors =  "";
              
                  foreach ($messages->all("<p>:message</p>") as $error){
                      $display_errors .= $error;
                  }#end foreach
              
                  return $display_errors;
              }
              
              $aluno =  $this->aluno->find($id)->update($dadosForm);
              return 1;
          
          }
          
          public function getDeletar($id){
                   $aluno =  $this->aluno->find($id);
                   $aluno->getPais()->detach();
                   $aluno->delete();
                    return 1;
          }
          
          public function getPais($id){
              
              $aluno = $this->aluno->find($id);
              $pais = $aluno->getPais()->paginate($this->totalItensPorPagina);
              $titulo = "Pais do aluno ".  $aluno->nome; 
              $paisAdd = $this->pai->all();
              
              return view('painel.alunos.pais', compact('aluno','pais','titulo', 'paisAdd'));
          }
          
          public function postAdicionarPai($idAluno){
           
              $this->aluno->find($idAluno)->getPais()->sync($this->request->get('id_pai'));
              return 1;
          }
          
          public function getDeletarPai($idAluno, $idPai){
              $this->aluno->find($idAluno)->getPais()->detach($idPai);
              return 1;
          }
          
          public function getPesquisar($palavraPesquisa = ""){
             $alunos =  $this->aluno->where('nome', 'LIKE', "%$palavraPesquisa%")->paginate($this->totalItensPorPagina);
             $turmas = Turma::all();
             return view('painel.alunos.index',compact('alunos', 'turmas'));
          }
          
          public function getPesquisarPais( $idAluno , $palavraPesquisa){
              $aluno = $this->aluno->find($idAluno);
              $pais = $aluno->getPais()->where('nome', 'LIKE', "%$palavraPesquisa%")->paginate($this->totalItensPorPagina);
              $titulo = "Pais do aluno ".  $aluno->nome; 
              $paisAdd = $this->pai->all();
              
              return view('painel.alunos.pais', compact('aluno','pais','titulo', 'paisAdd'));
          }
  
  
  
}
