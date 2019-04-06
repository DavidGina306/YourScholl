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
                                <button data-toggle="modal" onclick="add_prof()" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-save"></i></span>CADASTRAR</button>
                        </div>
                    
                        <h3 class="box-title m-b-0">Professores</h3>
                        <p class="text-muted m-b-30">Tabela Professores</p>
                        <div class="table-responsive">
                            <table id="prof_table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Contato</th>
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
    <!-- /.strater modal save -->
    <div class="modal fade bs-example-modal-lg" id="modalsave" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#2f323e">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel" style="color:white">CADASTRO PROFESSORES</h4>
                </div>
                <div class="modal-body">

                    <form id="f_save_prof"  name ="f_save_prof" data-toggle="validator" class="form-horizontal">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome" class="control-label col-xs-3 col-sm-3"> NOME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="nome" id="nome" minlength="5" maxlength="100" placeholder="Preencha com Nome" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dt_nasc" class="control-label col-xs-3 col-sm-3"> DATA NASCIMENTO</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="dt_nasc" id="dt_nasc">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="cep" class="control-label col-xs-3 col-sm-3">CEP</label>
                                <div class="col-sm-6">
                                    <input type="text" value="" class="form-control cep" name="cep" id="cep" minlength="9" maxlength="9" placeholder="Preencha com CEP" onblur="pesquisacep(this.value);"  required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-danger waves-effect text-left" >Buscar</button>

                                </div>
    
                        </div>

                         <div class="form-group">
                            <label for="logradouro" class="control-label col-xs-3 col-sm-3">LOGRADOURO</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="logradouro" id="logradouro" minlength="3" maxlength="3" placeholder="Preencha o Logradouro" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="bairro" class="control-label col-xs-3 col-sm-3">BAIRRO</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control caixa_alta" name="bairro" id="bairro" minlength="3" maxlength="3" placeholder="Preencha o Bairro" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="numero" class="control-label col-xs-3 col-sm-3">NUMERO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control caixa_alta" name="numero" id="numero" minlength="3" maxlength="3" placeholder="Preencha o Numero" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group camposExtras">
                                <label class=" control-label col-xs-3 col-sm-3" for='selectEstado'>ESTADO</label>
                                <div class="col-xs-8 col-sm-8">
    
                                    <select data-target="#selectCidade" id="selectEstado" name="selectEstado" class="form-control select2 col-xs-9" required>
    
                                    </select>
                                </div>
                        </div>
                        
                        <div class="form-group camposExtras">
                            <label class=" control-label col-xs-3 col-sm-3" for='selectCidade'>CIDADE</label>
                            <div class="col-xs-8 col-sm-8">

                                <select id="selectCidade" name="selectCidade" class="form-control select2 col-xs-9" required>

                                </select>
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <label for="cel" class="control-label col-xs-3 col-sm-3">CELULAR</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control celular" name="cel" id="cel" maxlength="14" placeholder="(99)99999-9999" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="tel" class="control-label col-xs-3 col-sm-3">TELEFONE</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control telefone" name="tel" id="tel" minlength="15" maxlength="15" placeholder="(99) 9999-9999" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email" class="control-label col-xs-3 col-sm-3">EMAIL</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control caixa_alta" name="email" id="email" minlength="3" maxlength="3" placeholder="Preencha com endereço de email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSave" class="btn btn-primary waves-effect text-left" data-tooltip="tooltip">Guardar</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<!-- /. end modal save -->
        

@endsection

@section('scripts')

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#selectCidade").val("");
                $("#selectEstado").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#selectCidade").val("...");
                        $("#selectEstado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#selectEstado").val(dados.uf);
                                $("#selectCidade").val(dados.localidade);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>


    <script>
            var estados = [];

            function loadEstados(element) {
                if (estados.length > 0) {
                    putEstados(element);
                    $(element).removeAttr('disabled');
                } else {
                    $.ajax({
                    url: 'https://api.myjson.com/bins/enzld',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function() {
                        $(element).html('<option>Carregando...</option>');
                    }
                    }).done(function(response) {
                    estados = response.estados;
                    putEstados(element);
                    $(element).removeAttr('disabled');
                    });
                }
            }
            function putEstados(element) {

                var label = $(element).data('label');
                label = label ? label : 'Estado';

                var options = '<option value="">' + label + '</option>';
                for (var i in estados) {
					var estado = estados[i];
					options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
                }

                $(element).html(options);
            }

            function loadCidades(element, estado_sigla) {
                 if (estados.length > 0) {
                    putCidades(element, estado_sigla);
                    $(element).removeAttr('disabled');
                } else {
                    $.ajax({
                        url: theme_url + '/assets/json/estados.json',
                        method: 'get',
                        dataType: 'json',
                        beforeSend: function() {
                        $(element).html('<option>Carregando...</option>');
                        }
                    }).done(function(response) {
                        estados = response.estados;
                        putCidades(element, estado_sigla);
                        $(element).removeAttr('disabled');
                    });
                    }
            }

            function putCidades(element, estado_sigla) {
                var label = $(element).data('label');
                label = label ? label : 'Cidade';

                var options = '<option value="">' + label + '</option>';
                for (var i in estados) {
                var estado = estados[i];
                if (estado.sigla != estado_sigla)
                    continue;
                for (var j in estado.cidades) {
                    var cidade = estado.cidades[j];
                    options += '<option value="' + cidade + '">' + cidade + '</option>';
                }
                }
                $(element).html(options);
            }

            document.addEventListener('DOMContentLoaded', function() {
                loadEstados('#selectEstado');
                $(document).on('change', '#selectEstado', function(e) {
                var target = $(this).data('target');
                if (target) {
                    loadCidades(target, $(this).val());
                }
                });
            }, false);
            
    </script>



    <script>
        
        $('.celular').mask('(99)99999-9999', {reverse: false});
        $('.telefone').mask('(99)9999-9999', {reverse: false});
        $('.cep').mask('99999-999', {reverse: false});
        $(".caixa_alta").keyup(function () {
            $(this).val($(this).val().toUpperCase());
        })
        
        function add_prof() {

            $('#f_save_prof')[0].reset();     

            $('#modalsave').modal('show');
        }
    </script>



    
    
    
    
    
    
    
    
    
    
    
    <script>
           
        $("#btnSave").click(function () {
                //console.log("save");
                  url = '/professores'
                  form = '#f_save_prof';
                  table = $('#prof_table').DataTable();
                  $.ajax({
                        url : url,
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "JSON",
                        success: function(data){

                            if($.isEmptyObject(data.error)){
                                alert(data.success);
                            }else{
                                console.log(data.error);
                            }
                              
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error adding / update data'+ errorThrown);
                          }
                     });
      
          });

    </script>

    <!-- DATATABLE-->
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
                    "url": url_base + "professores/show",
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