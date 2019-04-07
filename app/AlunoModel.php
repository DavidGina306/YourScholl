<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoModel extends Model
{
    protected $primaryKey = 'id_aluno';
    public $timestamps = false;
    protected $fillable = ['nome','data_nascimento','logradouro','numero','bairro','cidade','estado','cep',
    'status','celular','telefone','email'];
    protected $guarded = ['id_aluno', 'data_criacao', 'data_att'];
    protected $table = 'aluno';
}
