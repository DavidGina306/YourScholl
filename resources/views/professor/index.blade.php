@extends('layouts.app')

@section('conteudo')


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="pull-right">
                                    <button data-toggle="modal" onclick="add_dist()" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-save"></i></span>CADASTRAR</button>
                            </div>
                        
                            <h3 class="box-title m-b-0">Professores</h3>
                            <p class="text-muted m-b-30">Tabela Professores</p>
                            <div class="table-responsive">
                                <table id="prof_table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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

@section('scripts')
    <script>
            var url_base = 'http://localhost/salespromoter/public/';
            table = $('#prof_table').DataTable({
                "language": {
                        "search": "Pesquisar",
                        "lengthMenu": "Mostrando  _MENU_ registros",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Mostrando página 0 de 0",
                        "infoFiltered": "(Filtrado de _MAX_ entradas)",
                        "loadingRecords": "Carregando...",
                        "processing": "Processando...",
                        "zeroRecords": "Nenhum resultado encontrado",
                        "paginate": {
                            "first":"Primeiro",
                            "previous":"Anterior",
                            "next": "Seguinte",
                            "last": "Ultimo"
                        }
                    },
                    "ajax": {
                    "url": url_base + "distribuidora/show",
                    "type": "GET",
                    "dataSrc": ""
                    },

                    "columns": [
                    {"data": "DIST_ID" , 'width': '10%'},
                    {"data": "DIST_NFANTASIA", 'width': '15%'},
                    {"data": "DIST_CNPJ", 'width': '15%'},
                    {"data": "DIST_TEL1", 'width': '30%'},
                    {"data": "DIST_EMAIL", 'width': '30%'},
                    {"data": null, 'width': '20%',
                        "render": function ( data, type, row ) {
                            if (data.DIST_STATUS == 1){
                            return '<span class="label label-success">Ativo</span>';
                            }else{
                            return '<span class="label label-danger">Inativo</span>'; 
                            }
                        },},
                    {"data": null, 'width': '20%',
                        "render": function ( data, type, row ) {
                            return '<button data-toggle="tooltip" data-placement="top" title = "Editar" style="font-size: 12px ; padding: 0px 3px;" class="btn btn-warning" onclick="edit_dist('+data.DIST_ID+')"><i class="glyphicon glyphicon-pencil"></i></button><button data-toggle="tooltip" data-placement="top" title = "Mudar Status" style="font-size: 12px ; padding: 0px 3px;" class="btn btn-danger" onclick="cambiarstatus('+data.DIST_ID+')"><i class="glyphicon glyphicon-remove"></i>';
                        },}
                    ],
                    "select": {
                    "style":    'os',
                    "blurable": true
                        },
                            "order": [[ 0, "asc" ]],
                            "select": true,
                        
            });
    </script>
@endsection