
@extends('layouts.app')

@section('conteudo')

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"></h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">RelatorioGeral</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                            <a href="/relatorio_pdf/pdf" target="_blank" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-file-pdf-o"></i></span>GERAR PDF</a>
                    </div>
                    <div class="white-box">
                        
                        <h3 class="box-title m-b-0">Relátorio de Alunos por Curso</h3>
                        <div class="table-responsive">
                            <table id="curso_table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Alunos</th>
                                        <th>Curso</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($relatorio_data as $aluno)
                                        <tr>
                                            <td>{{ $aluno->aluno_nome }}</td>
                                            <td>{{ $aluno->professor_nome }}</td>
                                            <td>{{ $aluno->curso_nome }}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
@endsection