<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\ProfessorModel;
use App\CursoModel;

class CursoController extends Controller
{
    public function index(){

        return view('curso/index');
    }


    public function store(Request $request){

        $rules =array (
            'nome' => 'required|min:8|max:250|unique:curso',
            'ementa' => 'required|max:250',
            'cg_h' => 'required|digits_between:1,2000|numeric',
            'selectProfessor' => 'required',
        );
   

        $messages=array(
            'nome.required'=>'O campo nome é de preenchimento obrigátorio',
            'nome.unique'=>'Nome do curso já existente.',
            'ementa.required'=>'O campo ementa é de preenchimento obrigátorio',
            'cg_h.required'=>'O campo carga horaria é de preenchimento obrigátorio',
            'selectProfessor.required'=>'O campo Professor é de preenchimento obrigátorio',
            'nome.min'=>'O campo nome deve ter no minimo 5 caracteres',
            'ementa.min'=>'O campo ementa deve ter no minimo 5 caracteres',
            'ementa.max'=>'O campo ementa deve ter no máximo 250 caracteres',
            'nome.max'=>'O campo nome deve ter no máximo 250 caracteres',
            'cg_h.digits_between'=>'O campo carga horaria deve estar entre 1 a 2000 horas',
            'cg_h.numeric'=>'O campo carga horaria deve ser numerico'
            
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){

                $date = \Carbon\Carbon::now();
                $curso = new CursoModel;
                $curso->nome = Input::get('nome');
                $curso->ementa = Input::get('ementa');
                $curso->carga_horaria = Input::get('cg_h');
                $curso->id_professor = Input::get('selectProfessor');
                $curso->data_criacao =$date;
                $curso->status =1;		
                $curso->save();
        
                return response()->json([
                    'success'=>'Added new records.',
                    'last_insert_id' => $curso->id                
                ]);

        }

        return response()->json(['error'=>$validator->errors()->all()]);
    
    }


    public function show(){

        $dados = DB::table('curso')
                ->join('professor','curso.id_professor','=','professor.id_professor')
                ->select('curso.*', 'professor.nome as professor_nome')
                ->get();
        
        $dados = json_decode($dados, true);     
		return  json_encode($dados);

    }


    public function edit($id)
    {
        $dados = CursoModel::findOrFail($id);
        $dados = json_decode($dados, true);
        return  json_encode($dados);
    }

    public function update(Request $request)
    {
        $id= Input::get('custId');
        $rules =array (
            'nome_edt' => 'required|min:8|max:250|unique:curso,nome,'. $id .',id_curso',
            'ementa_edt' => 'required|max:250',
            'cg_h_edt' => 'required|digits_between:1,2000|numeric',
            'selectProfessor_edt' => 'required',
        );
   

        $messages=array(
            'nome_edt.required'=>'O campo nome é de preenchimento obrigátorio',
            'nome_edt.unique'=>'Nome do curso já existente.',
            'ementa_edt.required'=>'O campo ementa é de preenchimento obrigátorio',
            'cg_h_edt.required'=>'O campo carga horaria é de preenchimento obrigátorio',
            'selectProfessor_edt.required'=>'O campo Professor é de preenchimento obrigátorio',
            'nome_edt.min'=>'O campo nome deve ter no minimo 5 caracteres',
            'ementa_edt.min'=>'O campo ementa deve ter no minimo 5 caracteres',
            'ementa_edt.max'=>'O campo ementa deve ter no máximo 250 caracteres',
            'nome_edt.max'=>'O campo nome deve ter no máximo 250 caracteres',
            'cg_h_edt.digits_between'=>'O campo carga horaria deve estar entre 1 a 2000 horas',
            'cg_h_edt.numeric'=>'O campo carga horaria deve ser numerico'
            
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->passes()){
                $id= Input::get('custId');	
                $date = \Carbon\Carbon::now();
                $curso = new CursoModel;
                $curso = CursoModel::findOrFail($id);
                $curso->nome = Input::get('nome_edt');
                $curso->ementa = Input::get('ementa_edt');
                $curso->carga_horaria = Input::get('cg_h_edt');
                $curso->id_professor = Input::get('selectProfessor_edt');
                $curso->data_criacao =$date;
                $curso->status =1;	
                $curso->save();
        
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
            $curso = new CursoModel;
            
            $curso = CursoModel::findOrFail($id);
            $curso->data_att =$date;
            $curso->status =$status;		
            $curso->save();
            return response()->json(['success'=>'Added new records.']);
         

    }

    

}
