<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

                                       



## PROJETO YOURSCHOOLEAD - CRUD
<a href="http://yourschoolead.000webhostapp.com/"><p align="center"><img src="http://ap.imagensbrasil.org/images/2019/04/08/logo.png"></p></a>                                     

                                       http://yourschoolead.000webhostapp.com/

    
        
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
- [x] Clone o Projeto com comando na pasta de sua preferência  -   git clone https://github.com/DavidGina306/YourScholl.git

- [x] Instalar o composer (http://getcomposer.org/) 
 
 _Negrito_ => Após a instalação do composer
     
- [x] Crie a base de dados no Mysql como nome de => yourschool

- [x] Utlize os Seguintes comandos dentro da pasta do projeto:

 1°. composer
  
    composer install
    composer dump
         
2°. criar arquivo.env

    cp .env.example .env
Este comando cria o arquivo .env logo após a criação na pasta raiz,configureo neste trecho :
        
    LOG_CHANNEL=stack
    DB_DEFAULT=mysql
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=yourschool
    DB_USERNAME=root
    DB_PASSWORD=''     
    
3°. Migrar as tabelas do sistema
    
    php artisan migrate

4°. Artisan Serve
   
    <b>php artisan serve</b>

## Modelagem do Banco de Dados


![your_school](https://user-images.githubusercontent.com/39013655/55721775-380ea980-59d2-11e9-845f-8fcb91f645b9.jpg)

## DEMONSTRAÇÃO DE UM CRUD - CURSOS


![Gravar_2019_04_08_07_48_54_354](https://user-images.githubusercontent.com/39013655/55722835-5f1aaa80-59d5-11e9-8775-0e074a3e546b.gif)



    
    






