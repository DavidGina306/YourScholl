<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## PROJETO YOURSCHOOLEAD - CRUD
    link :  http://yourschoolead.000webhostapp.com/
        
        1. Criar CRUD de 3 tabelas listadas abaixo em PHP: - [x] Elaborado com Mysql
        
        TABELA
        - ALUNO
            + ID_ALUNO
            + NOME
            + DATA_NASCIMENTO
            + LOGRADOURO
            + NUMERO
            + BAIRRO
            + CIDADE
            + ESTADO
            + DATA_CRIACAO
            + CEP
            + ID_CURSO

        - CURSO
            + ID_CURSO
            + NOME
            + DATA_CRIACAO
            + ID_PROFESSOR

        - PROFESSOR
            + ID_ PROFESSOR
            + NOME
            + DATA_NASCIMENTO
            + DATA_CRIACAO


    2. Fazer uma consulta webservice nos correios para preencher os endereços a partir do CEP. Sugestões abaixo: 

    http://postmon.com.br/

    https://viacep.com.br/ 

    3. Gerar um relatório em PDF contendo os alunos cadastrados, qual curso ele pertence e quem é o professor dele. 

    4. Fazer versionamento do projeto em algum serviço git como github, bitbucket ou gitlab
## FASES ELABORADAS
- [x] Elaborado com Laravel utilizando Mysql ->Nome BD :yourschool
- [x] Consulta Cep -> utilizando o  https://viacep.com.br/
- [x] Geração de Relatorio -> utilizando o dompdf
- [x] Versionamento do projeto  -> utilizando o https://github.com/
## INSTALAÇÃO E CONFIGURAÇÃO DO SISTEMA
- [x] Instalar o composer (http://getcomposer.org/) 
 
 _Negrito_ => Após a instalação do composer
     
- [x] Crie a base de dados no Mysql como nome de => yourschool

- [x] Utlize os Seguintes comandos :
 <ol>
    <li>composer install<li>
     <li>composer dump<li>
    <li>php artisan key:generate<li>
 <ol>







