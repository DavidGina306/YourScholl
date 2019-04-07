<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\AlunoModel;


class AlunoController extends Controller
{
    public function index(){

        return view('aluno/index');
    }

    public function show(){

        $dados = DB::table('aluno')
                ->join('curso','aluno.id_curso','=','curso.id_curso')
                ->select('aluno.*', 'curso.nome as curso_nome')
                ->get();
       
        $dados = json_decode($dados, true);
        $size=count($dados);

        for($i=0;$i<$size;$i++){

            $dados[$i]["adress"] ="LOGRA: ". $dados[$i]["logradouro"]. ", BAIRRO: ". $dados[$i]["bairro"].", CEP: ".$dados[$i]["cep"]." , NUM: ".$dados[$i]["numero"].", CID: ".$dados[$i]["cidade"].", UF: ".$dados[$i]["estado"];
            $dados[$i]["contatos"]=$dados[$i]["celular"]." ".$dados[$i]["telefone"]." ".$dados[$i]["email"];
        }        
        return  json_encode($dados);

    }

    public function store(Request $request){

        $rules =array (
            'nome' => 'required|min:8|max:250',
            'dt_nasc' => 'required|date',
            'logradouro' => 'required|max:250',
            'bairro' => 'required|max:100',
            'numero' => 'max:10|required',
            'selectCidade' => 'required',
            'selectEstado' => 'required',
            'cep' => 'required|min:9|max:9',
            'tel' => 'required|min:13|max:13',
            'cel' => 'required|min:14|max:14',
            'email' => 'required|email|max:250|unique:aluno',
            'selectCurso'=>'required'
        );
   

        $messages=array(
            'nome.required'=>'O campo nome é de preenchimento obrigátorio',
            'dt_nasc.required'=>'A data de nascimento é de preenchimento',
            'logradouro.required'=>'O campo logradouro é de preenchimento obrigátorio',
            'bairro.required'=>'O campo bairro é de preenchimento obrigátorio',
            'selectCidade.required'=>'O campo cidade é de preenchimento obrigátorio',
            'selectEstado.required'=>'O campo estado é de preenchimento obrigátorio',
            'cep.required'=>'O campoc ep estado é de preenchimento obrigátorio',
            'tel.required'=>'O campo tel  é de preenchimento obrigátorio',
            'cel.required'=>'O campo cep ,
            é de preenchimento obrigátorio',
            'email.required'=>'O email  é de preenchimento obrigátorio',
            'cep.min'=>'O campo cep deve ter no minimo 9 caracteres',
            'tel.min'=>'O campo telefone deve ter no minimo 13 caracteres',
            'cel.min'=>'O campo celular deve ter no minimo 14 caracteres',
            'nome.min'=>'O campo cep deve ter no minimo 8 caracteres',
            'cep.max'=>'O campo cep deve ter no máximo 9 caracteres',
            'tel.max'=>'O campo telefone deve ter no máximo 13 caracteres',
            'cel.max'=>'O campo celular deve ter no máximo 14 caracteres',
            'bairro.max'=>'O campo bairro deve ter no máximo 100 caracteres',
            'numero.max'=>'O campo numero deve ter no máximo 10 caracteres',
            'nome.max'=>'O campo nome deve ter no máximo 250 caracteres',
            'email.max'=>'O campo email deve ter no máximo 250 caracteres',
            'logradouro.min'=>'O campo logradouro deve ter no máximo 250 caracteres',
            'email.email'=>'O campo email deve ser um email válido',
            'email.unique'=>'Já existe este email cadastrado.',
            'selectCurso.required'=>'O campo Curso é obrigatório',
            
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){

                $date = \Carbon\Carbon::now();
                $aluno = new AlunoModel;
                $aluno->nome = Input::get('nome');
                $aluno->data_nascimento = Input::get('dt_nasc');
                $aluno->cep = Input::get('cep');
                $aluno->logradouro = Input::get('logradouro');	
                $aluno->bairro = Input::get('bairro');	
                $aluno->numero = Input::get('numero');	
                $aluno->estado = Input::get('selectEstado');	
                $aluno->cidade = Input::get('selectCidade');
                $aluno->telefone = Input::get('tel');
                $aluno->celular = Input::get('cel');
                $aluno->email = Input::get('email');
                $aluno->id_curso = Input::get('selectCurso');
                $aluno->data_criacao =$date;
                $aluno->status =1;		
                $aluno->save();
        
                return response()->json(['success'=>'Added new records.']);

        }

        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function edit($id)
    {
        $dados = AlunoModel::findOrFail($id);
        $dados = json_decode($dados, true);
        return  json_encode($dados);
    }

    
    public function update(Request $request){
        
        $id= Input::get('custId');	

        $rules =array (
            'nome_edt' => 'required|min:8|max:250',
            'dt_nasc_edt' => 'required|date',
            'logradouro_edt' => 'required|max:250',
            'bairro_edt' => 'required|max:100',
            'numero_edt' => 'max:10|required',
            'selectCidade_edt' => 'required',
            'selectEstado_edt' => 'required',
            'cep_edt' => 'required|min:9|max:9',
            'tel_edt' => 'required|min:13|max:13',
            'cel_edt' => 'required|min:14|max:14',
            'email_edt' => 'required|email|max:250|unique:aluno,email,'. $id .',id_aluno',
            'selectCurso_edt'=>'required'
        );
   

        $messages=array(
            'nome_edt.required'=>'O campo nome é de preenchimento obrigátorio',
            'dt_nasc_edt.required'=>'A data de nascimento é de preenchimento',
            'logradouro_edt.required'=>'O campo logradouro é de preenchimento obrigátorio',
            'bairro_edt.required'=>'O campo bairro é de preenchimento obrigátorio',
            'selectCidade_edt.required'=>'O campo cidade é de preenchimento obrigátorio',
            'selectEstado_edt.required'=>'O campo estado é de preenchimento obrigátorio',
            'cep_edt.required'=>'O campoc ep estado é de preenchimento obrigátorio',
            'tel_edt.required'=>'O campo tel  é de preenchimento obrigátorio',
            'cel_edt.required'=>'O campo cep ,
            é de preenchimento obrigátorio',
            'email_edt.required'=>'O email  é de preenchimento obrigátorio',
            'cep_edt.min'=>'O campo cep deve ter no minimo 9 caracteres',
            'tel_edt.min'=>'O campo telefone deve ter no minimo 13 caracteres',
            'cel_edt.min'=>'O campo celular deve ter no minimo 14 caracteres',
            'nome_edt.min'=>'O campo cep deve ter no minimo 8 caracteres',
            'cep_edt.max'=>'O campo cep deve ter no máximo 9 caracteres',
            'tel_edt.max'=>'O campo telefone deve ter no máximo 13 caracteres',
            'cel_edt.max'=>'O campo celular deve ter no máximo 14 caracteres',
            'bairro_edt.max'=>'O campo bairro deve ter no máximo 100 caracteres',
            'numero_edt.max'=>'O campo numero deve ter no máximo 10 caracteres',
            'nome_edt.max'=>'O campo nome deve ter no máximo 250 caracteres',
            'email_edt.max'=>'O campo email deve ter no máximo 250 caracteres',
            'logradouro_edt.min'=>'O campo logradouro deve ter no máximo 250 caracteres',
            'email_edt.email'=>'O campo email deve ser um email válido',
            'email_edt.unique'=>'Já existe este email cadastrado.',
            'selectCurso_edt.required'=>'O campo Curso é obrigatório',
            
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){

                $date = \Carbon\Carbon::now();
                $aluno = new AlunoModel;
                $aluno = AlunoModel::findOrFail($id);
                $aluno->nome = Input::get('nome_edt');
                $aluno->data_nascimento = Input::get('dt_nasc_edt');
                $aluno->cep = Input::get('cep_edt');
                $aluno->logradouro = Input::get('logradouro_edt');	
                $aluno->bairro = Input::get('bairro_edt');	
                $aluno->numero = Input::get('numero_edt');	
                $aluno->estado = Input::get('selectEstado_edt');	
                $aluno->cidade = Input::get('selectCidade_edt');
                $aluno->telefone = Input::get('tel_edt');
                $aluno->celular = Input::get('cel_edt');
                $aluno->email = Input::get('email_edt');
                $aluno->id_curso = Input::get('selectCurso_edt');
                $aluno->data_criacao =$date;
                $aluno->status =1;		
                $aluno->save();
        
                return response()->json(['success'=>'Added new records.']);

        }

        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function editStatus($id,$status){

        if($status==0){
            $status=1;
        }else{
            $status=0;
        }
            $date = \Carbon\Carbon::now();
            $aluno = new AlunoModel;
            
            $aluno = AlunoModel::findOrFail($id);
            $aluno->data_att =$date;
            $aluno->status =$status;		
            $aluno->save();
            return response()->json(['success'=>'Added new records.']);
         

    }







}
