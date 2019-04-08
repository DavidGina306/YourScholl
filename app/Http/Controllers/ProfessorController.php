<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\ProfessorModel;

class ProfessorController extends Controller
{
    public function index(){
        //$products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('professor/index');
    }

    public function store(Request $request){

        $rules =array (
            'nome' => 'required|min:8|max:250',
            'dt_nasc' => 'required|date',
            'logradouro' => 'required|max:250',
            'bairro' => 'required|max:100',
            'numero' => 'max:10',
            'selectCidade' => 'required',
            'selectEstado' => 'required',
            'cep' => 'required|min:9|max:9',
            'tel' => 'required|min:13|max:13',
            'cel' => 'required|min:14|max:14',
            'email' => 'required|email|max:250',
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

        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){

                $date = \Carbon\Carbon::now();
                $professor = new ProfessorModel;
                $professor->nome = Input::get('nome');
                $professor->data_nascimento = Input::get('dt_nasc');
                $professor->cep = Input::get('cep');
                $professor->logradouro = Input::get('logradouro');
                $professor->bairro = Input::get('bairro');
                $professor->numero = Input::get('numero');
                $professor->estado = Input::get('selectEstado');
                $professor->cidade = Input::get('selectCidade');
                $professor->telefone = Input::get('tel');
                $professor->celular = Input::get('cel');
                $professor->email = Input::get('email');
                $professor->data_criacao =$date;
                $professor->status =1;
                $professor->save();

                return response()->json(['success'=>'Added new records.']);

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function show(){

        $dados = DB::table('professor')
        ->join('curso','professor.id_professor','=','curso.id_professor')
        ->select('professor.*', 'curso.nome as curso_nome')
        ->orderBy('nome', 'asc')
        ->get();

        $dados = json_decode($dados, true);
        $size=count($dados);

        for($i=0;$i<$size;$i++){

            $dados[$i]["adress"] ="". $dados[$i]["logradouro"]. ",". $dados[$i]["bairro"].", ".$dados[$i]["cep"]." ,: ".$dados[$i]["numero"].", ".$dados[$i]["cidade"].", ".$dados[$i]["estado"];
            $dados[$i]["contatos"]=$dados[$i]["celular"]." ".$dados[$i]["telefone"]." ".$dados[$i]["email"];
        }
		return  json_encode($dados);


    }

    public function edit($id)
    {
        $dados = ProfessorModel::findOrFail($id);
        $dados = json_decode($dados, true);
        return  json_encode($dados);
    }
    public function update(Request $request)
    {

        $rules =array (
            'nome_edt' => 'required|min:8|max:250',
            'dt_nasc_edt' => 'required|date',
            'logradouro_edt' => 'required|max:250',
            'bairro_edt' => 'required|max:100',
            'numero_edt' => 'max:10',
            'selectCidade_edt' => 'required',
            'selectEstado_edt' => 'required',
            'cep_edt' => 'required|min:9|max:9',
            'tel_edt' => 'required|min:13|max:13',
            'cel_edt' => 'required|min:14|max:14',
            'email_edt' => 'required|email|max:250',
        );


        $messages=array(
            'nome_edt.required'=>'O campo nome é de preenchimento obrigátorio',
            'dt_nasc_edt.required'=>'A data de nascimento é de preenchimento',
            'logradouro_edt.required'=>'O campo logradouro é de preenchimento obrigátorio',
            'bairro_edt.required'=>'O campo bairro é de preenchimento obrigátorio',
            'selectCidade_edt.required'=>'O campo cidade é de preenchimento obrigátorio',
            'selectEstado_edt.required'=>'O campo estado é de preenchimento obrigátorio',
            'cep_edt.required'=>'O campo cep é de preenchimento obrigátorio',
            'tel_edt.required'=>'O campo telefone  é de preenchimento obrigátorio',
            'cel_edt.required'=>'O campo celular é de preenchimento obrigátorio',
            'email_edt.required'=>'O email estado é de preenchimento obrigátorio',
            'cep_edt.min'=>'O campo cep deve ter no minimo 9 caracteres',
            'tel_edt.min'=>'O campo telefone deve ter no minimo 13 caracteres',
            'cel_edt.min'=>'O campo celular deve ter no minimo 14 caracteres',
            'nome_edt.min'=>'O campo nome deve ter no minimo 8 caracteres',
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

        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){
                $id= Input::get('custId');
                $date = \Carbon\Carbon::now();
                $professor = new ProfessorModel;
                $professor = ProfessorModel::findOrFail($id);
                $professor->nome = Input::get('nome_edt');
                $professor->data_nascimento = Input::get('dt_nasc_edt');
                $professor->cep = Input::get('cep_edt');
                $professor->logradouro = Input::get('logradouro_edt');
                $professor->bairro = Input::get('bairro_edt');
                $professor->numero = Input::get('numero_edt');
                $professor->estado = Input::get('selectEstado_edt');
                $professor->cidade = Input::get('selectCidade_edt');
                $professor->telefone = Input::get('tel_edt');
                $professor->celular = Input::get('cel_edt');
                $professor->email = Input::get('email_edt');
                $professor->data_att =$date;
                $professor->status =1;
                $professor->save();

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
            $professor = new ProfessorModel;

            $professor = ProfessorModel::findOrFail($id);
            $professor->data_att =$date;
            $professor->status =$status;
            $professor->save();
            return response()->json(['success'=>'Added new records.']);


    }




}
