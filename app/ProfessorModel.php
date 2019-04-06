<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorModel extends Model
{
    protected $primaryKey = 'id_professor';
    public $timestamps = false;
    protected $fillable = ['nome','data_nascimento','logradouro','numero','bairro','cidade','estado','cep',
    'status','celular','telefone','email'];
    protected $guarded = ['id_professor', 'data_criacao', 'data_att'];
    protected $table = 'professor';
}
