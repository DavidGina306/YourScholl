<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorModel extends Model
{
    protected $fillable = ['nome','data_nascimento','logradouro','numero','bairro','cidade','estado','cep',
    'status','celular','telefone','email'];
    protected $guarded = ['id_aluno', 'data_criacao', 'data_att'];
    protected $table = 'professor';
}
