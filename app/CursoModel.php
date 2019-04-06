<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoModel extends Model
{
    protected $primaryKey = 'id_curso';
    public $timestamps = false;
    protected $fillable = ['nome','ementa','carga_horaria',
    'status','id_professor'];
    protected $guarded = ['id_curso', 'data_criacao', 'data_att'];
    protected $table = 'curso';
}
