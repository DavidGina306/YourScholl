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
                        <li class="active">Aluno</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="pull-right">
                            <button data-toggle="modal" onclick="add_alun()" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-save"></i></span>CADASTRAR</button>
                        </div>
                    
                        <h3 class="box-title m-b-0">Alunos</h3>
                        <p class="text-muted m-b-30">Tabela Alunos</p>
                        <div class="table-responsive">
                            <table id="alun_table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>DataNasc</th>
                                        <th>Endereço</th>
                                        <th>Contato</th>
                                        <th>Curso</th>
                                        <th>Status</th>
                                        <th>Ações</th>
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
                    <h4 class="modal-title" id="myLargeModalLabel" style="color:white">CADASTRO ALUNOS</h4>
                </div>
                <div class="modal-body">

                    <form id="f_save_alun"  name ="f_save_alun" data-toggle="validator" class="form-horizontal">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome" class="control-label col-xs-3 col-sm-3"> NOME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="nome" id="nome" minlength="5" maxlength="100" placeholder="Preencha com Nome" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group camposExtras">
                            <label class=" control-label col-xs-3 col-sm-3" for='selectCurso'>CURSO</label>
                            <div class="col-xs-4 col-sm-4">

                                <select id="selectCurso" name="selectCurso" class="form-control select2 col-xs-9" required>

                                </select>
                            </div>
                            <div class="col-sm-2">
                                    <button onclick="add_curso()" type="button" class="btn btn-info waves-effect text-left" >NOVO</button>

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
    
                        </div>

                         <div class="form-group">
                            <label for="logradouro" class="control-label col-xs-3 col-sm-3">LOGRADOURO</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="logradouro" id="logradouro" minlength="2" maxlength="250" placeholder="Preencha o Logradouro" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="bairro" class="control-label col-xs-3 col-sm-3">BAIRRO</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control caixa_alta" name="bairro" id="bairro" minlength="2" maxlength="150" placeholder="Preencha o Bairro" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="numero" class="control-label col-xs-3 col-sm-3">NUMERO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control caixa_alta" name="numero" id="numero" maxlength="3" placeholder="Preencha o Numero" required>
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
                                <input type="text" class="form-control telefone" name="tel" id="tel" minlength="13" maxlength="13" placeholder="(99) 9999-9999" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email" class="control-label col-xs-3 col-sm-3">EMAIL</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control caixa_alta" name="email" id="email"  maxlength="250" placeholder="Preencha com endereço de email" required>
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
    <!-- END MODAL SAVE -->


    <!-- OPEN MODAL EDIT -->
    <div class="modal fade bs-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#2f323e">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel" style="color:white">EDIÇÃO DE PROFESSORES</h4>
                </div>
                <div class="modal-body">

                    <form id="f_edit_alun"  name ="f_edit_alun" data-toggle="validator" class="form-horizontal">
                            {{ csrf_field() }}
                        <input type="hidden" id="custId" name="custId">
                        <div class="form-group">
                            <label for="nome" class="control-label col-xs-3 col-sm-3"> NOME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="nome_edt" id="nome_edt" minlength="5" maxlength="250" placeholder="Preencha com Nome" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        
                        <div class="form-group camposExtras">
                                <label class=" control-label col-xs-3 col-sm-3" for='selectCurso_edt'>CURSO</label>
                                <div class="col-xs-4 col-sm-4">
    
                                    <select id="selectCurso_edt" name="selectCurso_edt" class="form-control select2 col-xs-9" required>
    
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                        <button onclick="add_curso()" type="button" class="btn btn-info waves-effect text-left" >NOVO</button>
    
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="dt_nasc" class="control-label col-xs-3 col-sm-3"> DATA NASCIMENTO</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="dt_nasc_edt" id="dt_nasc_edt">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="cep" class="control-label col-xs-3 col-sm-3">CEP</label>
                                <div class="col-sm-6">
                                    <input type="text" value="" class="form-control cep" name="cep_edt" id="cep_edt" minlength="9" maxlength="9" placeholder="Preencha com CEP" onblur="pesquisacep(this.value);"  required>
                                    <div class="help-block with-errors"></div>
                                </div>    
                        </div>

                            <div class="form-group">
                            <label for="logradouro" class="control-label col-xs-3 col-sm-3">LOGRADOURO</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="logradouro_edt" id="logradouro_edt"  maxlength="250" placeholder="Preencha o Logradouro" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="bairro" class="control-label col-xs-3 col-sm-3">BAIRRO</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control caixa_alta" name="bairro_edt" id="bairro_edt"  maxlength="100" placeholder="Preencha o Bairro" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="numero" class="control-label col-xs-3 col-sm-3">NUMERO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control caixa_alta" name="numero_edt" id="numero_edt" minlength="3" maxlength="3" placeholder="Preencha o Numero" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group camposExtras">
                                <label class=" control-label col-xs-3 col-sm-3" for='selectEstado_edt'>ESTADO</label>
                                <div class="col-xs-8 col-sm-8">
    
                                    <select data-target="#selectCidade_edt" id="selectEstado_edt" name="selectEstado_edt" class="form-control select2 col-xs-9" required>
    
                                    </select>
                                </div>
                        </div>
                        
                        <div class="form-group camposExtras">
                            <label class=" control-label col-xs-3 col-sm-3" for='selectCidade_edt'>CIDADE</label>
                            <div class="col-xs-8 col-sm-8">

                                <select id="selectCidade_edt" name="selectCidade_edt" class="form-control select2 col-xs-9" required>

                                </select>
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <label for="cel_edt" class="control-label col-xs-3 col-sm-3">CELULAR</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control celular" name="cel_edt" id="cel_edt" maxlength="14" placeholder="(99)99999-9999" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="tel_edt" class="control-label col-xs-3 col-sm-3">TELEFONE</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control telefone" name="tel_edt" id="tel_edt" minlength="13" maxlength="13" placeholder="(99) 9999-9999" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email_edt" class="control-label col-xs-3 col-sm-3">EMAIL</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control caixa_alta" name="email_edt" id="email_edt"  maxlength="250" placeholder="Preencha com endereço de email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        
                    </form>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btnEdit" class="btn btn-primary waves-effect text-left" data-tooltip="tooltip">Guardar</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /. end modal save -->


    <!-- /.strater modal save -->
    <div class="modal fade bs-example-modal-lg" id="modalsaveAlun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#2f323e">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel" style="color:white">CADASTRO DE CURSOS</h4>
                </div>
                <div class="modal-body">

                    <form id="f_save_curso"  name ="f_save_curso" data-toggle="validator" class="form-horizontal">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome" class="control-label col-xs-3 col-sm-3"> NOME</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control caixa_alta" name="nome" id="nome" minlength="5" maxlength="100" placeholder="Preencha com Nome" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="ementa" class="control-label col-xs-3 col-sm-3">EMENTA</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="ementa" name="ementa" rows="5" maxlength="250" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                                <label for="cg_h" class="control-label col-xs-3 col-sm-3" >CARGA HORARIA</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="cg_h" min='0' max='5000' id="cg_h" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                        </div>
                            

                        <div class="form-group">
                            <label class=" control-label col-xs-3 col-sm-3" for='selectProfessor'>Professor</label>
                            <div class="col-xs-6 col-sm-6">

                                <select id='selectProfessor' name='selectProfessor' class="form-control select2 col-xs-9" required>

                                </select>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btnSaveCurso" class="btn btn-primary waves-effect text-left" data-tooltip="tooltip">Guardar</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- END MODAL SAVE -->
@endsection

@section('scripts')

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <!-- Adicionando Javascript -->

    <!-- CEP -->
    <script type="text/javascript" >
        // MODAL SAVE
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
                                loadCidades("#selectCidade",  $("#selectEstado").val());
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

        //MODAL EDIT CEP
        $(document).ready(function() {

            function limpa_formulário_cep_edt() {
                // Limpa valores do formulário de cep.
                $("#logradouro_edt").val("");
                $("#bairro_edt").val("");
                $("#selectCidade_edt").val("");
                $("#selectEstado_edt").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep_edt").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro_edt").val("...");
                        $("#bairro_edt").val("...");
                        $("#selectCidade_edt").val("...");
                        $("#selectEstado_edt").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro_edt").val(dados.logradouro);
                                $("#bairro_edt").val(dados.bairro);
                                $("#selectEstado_edt").val(dados.uf);
                                loadCidades("#selectCidade_edt",  $("#selectEstado_edt").val());
                                $("#selectCidade_edt").val(dados.localidade);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep_edt();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep_edt();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep_edt();
                }
            });
        });

    </script>

    <!-- ESTADOS , CIDADES-->
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


    <!-- OPEN MODALS -->
    <script>
        
        $('.celular').mask('(99)99999-9999', {reverse: false});
        $('.telefone').mask('(99)9999-9999', {reverse: false});
        $('.cep').mask('99999-999', {reverse: false});
        $(".caixa_alta").keyup(function () {
            $(this).val($(this).val().toUpperCase());
        })
        
        function add_alun() {
            $("#f_save_alun")[0].reset();
  

            $('#modalsave').modal('show');
        }

        function add_curso(){

            $("#f_save_curso")[0].reset();
  

            $('#modalsaveAlun').modal('show');
            
        }

        function edit_alun(id) {
        
            $.ajax({
                type: 'get',
                dataType: 'json',
                url:'/alunos/editar/'+id,
                success: function (data, textStatus, jqXHR) {
                    
                    $("#custId").val(data.id_aluno);
                    $("#nome_edt").val(data.nome);
                    $("#dt_nasc_edt").val(data.data_nascimento);
                    $("#logradouro_edt").val(data.logradouro);
                    $("#bairro_edt").val(data.bairro);
                    $("#numero_edt").val(data.numero);
                    $("#cep_edt").val(data.cep);
                    $("#numero_edt").val(data.numero);
                    $("#tel_edt").val(data.telefone);
                    $("#cel_edt").val(data.celular);
                    $("#email_edt").val(data.email);
                    $("#selectCurso_edt").val(data.id_curso).change();                                 
                    //adress    
                    loadEstados('#selectEstado_edt');
                    $("#selectEstado_edt").val(data.estado).change();
                    loadCidades("#selectCidade_edt",  $("#selectEstado_edt").val());
                    $("#selectCidade_edt").val(data.cidade).change();                                     
                    $('#modaledit').modal('show');
                    
                },
                error: function (data, textStatus, errorThrown) {
                    alert('Error - ' + errorThrown);
                }
            });

           // $('#modal_plus').modal('show');
        }
    </script>


    
    <!-- SAVE,EDIT,CHANGE STATUS -->
    <script>
        function mudar_status(id,nome,status) {
                table = $('#alun_table').DataTable();
                swal({
                    title: "Mudar Status do Professor : "+nome+"?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Sim,Continuar!",
                    cancelButtonText:"Cancelar",
                    closeOnConfirm: false
                },
                    function () {
                            $.ajax({
                            type: "GET",
                            url:'/professores/status/'+id+"/"+status,
                            dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
                                swal({
                                  title: "CONFIRMADO!",
                                  text: "Alteração Realizada com Sucesso.",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonClass: 'btn-success',
                                  confirmButtonText: 'Aceitar',
    
                                }, function(){
                                  table.ajax.reload();
                                });
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                swal({
                                    title: 'AVISO!',
                                    text: 'Error - ' + errorThrown,
                                    type: 'warning',
                                    html: true,
                                    confirmButtonClass: 'btn-warning',
                                    confirmButtonText: 'Aceitar',
                                });
    
                            }
                            });
    
                });
    
    
        }   
        //save curso
        $("#btnSaveCurso").click(function () {
            //console.log("save");
            url = '/cursos'
            form = '#f_save_curso';
            $.ajax({
                url : url,
                type: "POST",
                data: $(form).serialize(),
                dataType: "JSON",
                success: function(data){

                    if($.isEmptyObject(data.error)){
                        $("#modalsaveAlun").modal('hide');
                        swal({
                            title: "CONFIRMADO!",
                            text: "Cadastro Realizado com Sucesso.",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'Aceitar',
                            });

                            cargerSelectCurso();
                            
                    }else{

                        swal({
                            title: 'Erro ao Cadastrar!',
                            text: data.error,
                            type: 'warning',
                            html :  true,
                            confirmButtonClass: 'btn-warning',
                            confirmButtonText: 'Aceitar',
                        });

                        console.log(data.error);
                    }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data'+ errorThrown);
                    }
                });

        });
        //save aluno
        $("#btnSave").click(function () {
            //console.log("save");
                url = '/alunos'
                form = '#f_save_alun';
                table = $('#alun_table').DataTable();
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function(data){

                        if($.isEmptyObject(data.error)){
                            $("#modalsave").modal('hide');
                                swal({
                                title: "CONFIRMADO!",
                                text: "Cadastro Realizado com Sucesso.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'Aceitar',

                            }, function(){
                                table.ajax.reload();
                            });
                        }else{

                            swal({
                                title: 'Erro ao Cadastrar!',
                                text: data.error,
                                type: 'warning',
                                html :  true,
                                confirmButtonClass: 'btn-warning',
                                confirmButtonText: 'Aceitar',
                            });

                            console.log(data.error);
                        }
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data'+ errorThrown);
                        }
                    });

        });
        //edit aluno
        $("#btnEdit").click(function () {
            //console.log("save");
              id= $('#custId').val();
              url = '/alunos/editar'
              form = '#f_edit_alun';
              table = $('#alun_table').DataTable();
              $.ajax({
                url : url,
                type: "POST",
                data: $(form).serialize(),
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    if($.isEmptyObject(data.error)){
                        $("#modaledit").modal('hide');
                                swal({
                                title: "CONFIRMADO!",
                                text: "Alteração Realizada com Sucesso.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'Aceitar',

                            }, function(){
                                table.ajax.reload();
                        });
                    }else{
                        
                        swal({
                            title: 'Erro ao Cadastrar!',
                            text: data.error,
                            type: 'warning',
                            html :  true,
                            confirmButtonClass: 'btn-warning',
                            confirmButtonText: 'Aceitar',
                        });;
                    }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data'+ errorThrown);
                    }
                });

        });
    </script>

    <!-- DATATABLE GET-->
    <script>
            //var url_base = 'http://localhost/salespromoter/public/';
            table = $('#alun_table').DataTable({
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
                    "url":"/alunos/show",
                    "type": "GET",
                    "dataSrc": ""
                    },

                    "columns": [
                    {"data": "id_aluno" , 'width': '5%'},
                    {"data": "nome" , 'width': '20%'},
                    {"data": "data_nascimento" , 'width': '5%'},
                    {"data": "adress", 'width': '45%'},
                    {"data": "contatos", 'width': '15%'},
                    {"data": "curso_nome", 'width': '10%'},
                    {"data": null, 'width': '5%',
                        "render": function ( data, type, row ) {
                            if (data.status == 1){
                            return '<span class="label label-success">Ativo</span>';
                            }else{
                            return '<span class="label label-danger">Inativo</span>'; 
                            }
                        },},
                    {"data": null, 'width': '5%',
                        "render": function ( data, type, row ) {
                            return '<button data-toggle="tooltip" data-placement="top" title = "Editar" style="font-size: 12px ; padding: 0px 3px;" class="btn btn-primary" onclick="edit_alun(' + data.id_aluno + ')"><i class="glyphicon glyphicon-pencil"></i></button><button data-toggle="tooltip" data-placement="top" title = "Mudar Status" style="font-size: 12px ; padding: 0px 3px;" class="btn btn-warning" onclick="mudar_status(' + data.id_aluno + ',\''+ data.nome+'\','+data.status+')"><i class="glyphicon glyphicon-ban-circle"></i></button>';
                        },}
                    ],
                        
            });


    </script>
    
    <!-- CARGER SELECTS -->
    <script>
        
        $(document).ready(function(){
            cargerSelect();
            cargerSelectCursoEdt();
            cargerSelectCurso(); 
        });
        function cargerSelect(){
            
            $('#selectProfessor').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/professores/show',
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var len = 0;
                    if(response!= null){
                        len = response.length;
                        // console.log(len);
                    }

                    if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){
                        //console.log(response[i].id_professor);
                        var id = response[i].id_professor;
                        var name = response[i].nome;

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#selectProfessor").append(option); 
                    }
                    }

                }
            });
        }
        function cargerSelectCurso(){
            
            $('#selectCurso').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/cursos/show',
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var len = 0;
                    if(response!= null){
                        len = response.length;
                        // console.log(len);
                    }

                    if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){
                        //console.log(response[i].id_professor);
                        var id = response[i].id_curso;
                        var name = response[i].nome;

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#selectCurso").append(option); 
                    }
                    }

                }
            });
        }

        function cargerSelectCursoEdt(){
            
            $('#selectCurso_edt').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/cursos/show',
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var len = 0;
                    if(response!= null){
                        len = response.length;
                        // console.log(len);
                    }

                    if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){
                        //console.log(response[i].id_professor);
                        var id = response[i].id_curso;
                        var name = response[i].nome;

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#selectCurso_edt").append(option); 
                    }
                    }

                }
            });
        }
    
    </script>


@endsection