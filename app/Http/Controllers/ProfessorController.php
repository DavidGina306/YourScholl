<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Professor;

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
            'email' => 'required|email|max:250|unique:professor',
        );
   

        $messages=array(
            'nome.required'=>'O campo nome é de preenchimento obrigátorio',
            'dt_nasc.required'=>'A data de nascimento é de preenchimento',
            'logradouro.required'=>'O campo logradouro é de preenchimento obrigátorio',
            'bairro.required'=>'O campo bairro é de preenchimento obrigátorio',
            'selectCidade.required'=>'O campo cidade é de preenchimento obrigátorio',
            'selectEstado.required'=>'O campo estado é de preenchimento obrigátorio',
            'cep.required'=>'O cep estado é de preenchimento obrigátorio',
            'tel.required'=>'O cep estado é de preenchimento obrigátorio',
            'cel.required'=>'O cep estado é de preenchimento obrigátorio',
            'email.required'=>'O email estado é de preenchimento obrigátorio',
            'cep.min'=>'O campo cep deve ter no minimo 9 caracteres',
            'tel.min'=>'O campo tel deve ter no minimo 13 caracteres',
            'cel.min'=>'O campo cel deve ter no minimo 14 caracteres',
            'nome.min'=>'O campo cep deve ter no minimo 8 caracteres',
            'cep.max'=>'O campo cep deve ter no máximo 9 caracteres',
            'tel.max'=>'O campo tel deve ter no máximo 13 caracteres',
            'cel.max'=>'O campo cel deve ter no máximo 14 caracteres',
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
                $professor = new Professor;
                $professor->nome = Input::get('nome');
                $professor->data_nascimento = Input::get('data_nascimento');
                $professor->cep = Input::get('cep');
                $professor->logradouro = Input::get('logradouro');	
                $professor->bairro = Input::get('bairro');	
                $professor->numero = Input::get('numero');	
                $professor->estado = Input::get('estado');	
                $professor->cidade = Input::get('cidade');
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



}
