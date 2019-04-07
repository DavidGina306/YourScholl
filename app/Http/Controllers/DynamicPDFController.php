<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index(){
        
        $relatorio_data=$this->get_relatorio_data();
        return view('relatorios/lista_alunos')->with('relatorio_data',$relatorio_data);

    }

    function get_relatorio_data(){

        $relatorio_data=DB::table('aluno')
        ->select('aluno.nome as aluno_nome','professor.nome as professor_nome','curso.nome as curso_nome')
        ->join('curso','curso.id_curso','=','aluno.id_curso')
        ->join('professor','curso.id_professor','=','professor.id_professor')
        ->get();
        return  $relatorio_data;
    } 

    function pdf(){

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_relatorio_data_html());
        return $pdf->stream();
    }

    function convert_relatorio_data_html(){

        $relatorio_data=$this->get_relatorio_data();
        
        $output = '
        <h3 align="center">Relação Aluno - Curso</h3>
        <table widht="100%" style="border-collapse:collapse; border:0px;">
            <tr>        
                <th style="border:1px solid;padding:12px;" widht="30%">Aluno</th>
                <th style="border:1px solid;padding:12px;" widht="30%">Curso</th>
                <th style="border:1px solid;padding:12px;" widht="30%">Professor</th>
            
            </tr>
        ';

        foreach($relatorio_data as $relatorio){
            $output .='

            <tr>        
                <th style="border:1px solid;padding:12px;" widht="20%">'.$relatorio->aluno_nome.'</th>
                <th style="border:1px solid;padding:12px;" widht="20%">'.$relatorio->curso_nome.'</th>
                <th style="border:1px solid;padding:12px;" widht="20%">'.$relatorio->professor_nome.'</th>
        
            </tr>          
            
            ';
        }

        $output.= '</table>';

        return $output;

    }
}
