<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $visible = ['nome','placa'];
    protected $guarded = ['id'] ;
    
    static $rules = [
    
        'nome' => 'required|min:3|max:100',
        'placa' => 'required|min:7|max:7|unique:carros'
    ];
    
    public function getChassi(){
        return $this->hasOne('App\Models\Painel\CarrosChassi','id_carro');
    }
    
    public function getMarca(){
        return $this->hasMany('App\Models\Painel\CarroMarcas','id','id_marca');
    }
}


