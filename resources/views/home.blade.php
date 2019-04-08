@extends('layouts.app')

@section('conteudo')


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="row bg-title">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title">CASDASTROS E RELÁTORIOS </h4> </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <ol class="breadcrumb">
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                            <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                            <div class="col-lg-3 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Professores</h3> 
                                    <a href="/professores"><img src="{{ asset('app-assets/plugins/images/download.png') }}" alt="alert" class="img-responsive model_img" id="professor"></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Cursos</h3> 
                                    <a href="/cursos"><img src="{{ asset('app-assets/plugins/images/curso.png') }}"  class="img-responsive model_img" id=""></a> 
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Alunos</h3>
                                    <a href="/alunos"><img src="{{ asset('app-assets/plugins/images/aluno.png') }}" alt="alert" class="img-responsive model_img" id=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Relátorios</h3>
                                    <a href="/relatorio_dinamico"><img src="{{ asset('app-assets/plugins/images/relatorio.png') }}" alt="alert" class="img-responsive model_img" id=""></a>
                                </div>
                            </div>
                    </div>
        </div>

@endsection

@section('script')

@endsection