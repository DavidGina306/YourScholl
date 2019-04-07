<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

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

        $pdf = new Dompdf();
        $pdf->loadHtml($this->convert_relatorio_data_html());
        $pdf->setBasePath(public_path()); // This line resolve
        $pdf->render();
        $pdf->setPaper('A4');
        $pdf->stream('arquivo');
    }

    function convert_relatorio_data_html(){
        $date = \Carbon\Carbon::now();
        $relatorio_data=$this->get_relatorio_data();
        $output='

            <link href="app-assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="all">
            <link href="app-assets/css/style.css" rel="stylesheet" media="all">
            <link href="app-assets/css/colors/default.css" rel="stylesheet" media="all">
        ';

        $output .= '
        <div class="white-box">

        <div class="text-center">
            <img src="app-assets/images/logo.png" class="rounded" alt="...">
         </div>
         <h4 class="text-center box-title m-b-10">YOURSCHOOL - A ESCOLA MAIS PERTO DE VOCÊ</h4>
        </div>
        <div class="pull-right">
            <span>Emitido em: '.$date.'</span>
        </div>
        <div class="white-box">
                        
            <h3 class="box-title m-b-0">Relátorio de Alunos por Curso</h3>
            <div class="table-responsive">
                <table id="curso_table" class="table color-table success-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alunos</th>
                            <th>Curso</th>
                            <th>Professor</th>
                        </tr>
                    </thead>
                    <tbody>
        ';
        $count =0;
        foreach($relatorio_data as $relatorio){
            $count=$count+1;
            $output .='

            <tr> 
                <th>'.$count.'</th>       
                <th>'.$relatorio->aluno_nome.'</th>
                <th>'.$relatorio->curso_nome.'</th>
                <th>'.$relatorio->professor_nome.'</th>
        
            </tr>          
            
            ';
        }

        $output.= '

                </tbody>
                </table>
            </div>
        </div>
        
        ';

        return $output;

    }
}
