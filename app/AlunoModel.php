<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoModel extends Model
{
    protected $fillable = ['nome','data_nascimento','logradouro','numero','bairro','cidade','estado','cep',
    'status','celular','telefone','email,id_curso'];
    protected $guarded = ['id_aluno', 'data_criacao', 'data_att'];
    protected $table = 'aluno';
}
