<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $guarded =['id'];
    
    static $rules = [
        
        'nome'                =>  'required|min:3|max:60',
        'id_turma'               =>  'required',
        'telefone'            =>  'required|min:11|max:20',
        'data_nascimento'     =>  'required',
        
    ];
    
    
    public function getDataNascimentoAttribute($data_nascimento){
        return \Carbon\Carbon::parse()->format('d/m/Y');    
    }
    
    public function getPais(){
        return $this->belongsToMany('App\Models\Painel\Pai','alunos_pais', 'id_aluno', 'id_pai');
    }
}
