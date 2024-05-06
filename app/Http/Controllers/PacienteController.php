<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Mockery\Exception;
use \Notion;


use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;


class PacienteController extends Controller
{
    const DATABASE_ID = "f30bc42f90ce4e0492e535961d0a6a58";

    public function sincronizar(){

        //$database = Notion::databases()->find(self::DATABASE_ID);
        //$collectionOfProperties = $database->getProperties();

        /*
        $colunas = \Illuminate\Support\Facades\Schema::getColumnListing($paciente->getTable());
        $escreva='';
        foreach($colunas as $value){
            $escreva .= '$paciente->'.$value.' = $request->'.$value.';</br>';
        }
        return $escreva;*/



        $database = Notion::database(self::DATABASE_ID)
            ->query()
            ->asCollection();
        $message = '<ul class="list-group">';

       foreach($database as $item){
           $lista = $item->toArray();
           $id = $item->getId();
           try{
               $nome = $lista['rawProperties']['Name']['title'][0]['plain_text'];
           }
           catch (\Exception $e){
               $nome = null;
           }

           try{
               $cpf = $lista['rawProperties']['cpf']['rich_text'][0]['plain_text'];
           }
           catch (\Exception $e){
               $cpf = null;
           }
           /*
           try{
               $email = $lista['rawProperties']['email']['rich_text'][0]['plain_text'];
           }
           catch (\Exception $e){
               $email = null;
           }*/

           try{
               Paciente::sync($id,$nome,$cpf);
               $message .= '<li class="list-group-item list-group-item-success"><i class="bi bi-check-lg "></i> '.$nome.' - ok'."</li>";
           }
           catch (\Exception $e){
               $message .= '<li class="list-group-item list-group-item-warning"><i class="bi bi-exclamation-triangle"></i> '.$nome.' - '.$e->getMessage()."</li>";
           }


       }
        $message .='</ul>';
        return response($message,200);

    }

    public function index(Request $r){
        $pacientes = Paciente::all();
        return view('pacientes')->with('pacientes',$pacientes);
    }

    public function search($key){
        $pacientes = Paciente::where('nome', 'like','%'.$key.'%')->orWhere('cpf','%'.$key.'%')->limit(10)->get();
        $html='';
        foreach($pacientes as $paciente){
            $html.='<a href="#" class="list-group-item list-group-item-action"  onclick="fill(`'.$paciente->nome.'`,`'.$paciente->id.'`)" ><i class="bi bi-person-fill"></i> '.$paciente->nome.'</a>';
        }
        return $html;
    }

    public function create(){
        $paciente = new Paciente();

        return view('pacientes-new');
    }

    public function store(Request $request){

        $request->validate([
            'nome'=>'required',
        ]);
        $paciente = new Paciente();
        $paciente->notionid = $request->cpf;
        $paciente->nome = $request->nome;
        $paciente->cpf = preg_replace("/[^0-9]/", '', $request->cpf);
        $paciente->responsavel=preg_replace("/[^0-9]/", '',request->responsavel);
        $paciente->email = $request->email;
        $paciente->logradouro = $request->logradouro;
        $paciente->numero = $request->numero;
        $paciente->complemento = $request->complemento;
        $paciente->bairro = $request->bairro;
        $paciente->cidade = $request->cidade;
        $paciente->uf = $request->uf;
        $paciente->pais = $request->pais;
        $paciente->cep = preg_replace("/[^0-9]/", '', $request->cep);

        try{
            $paciente->save();

        }
        catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }
        return redirect('/pacientes')->with('alerts',['success'=>['Cadastro realizado com sucesso.']]);




    }

    public function edit(int $id){
        $paciente = Paciente::findOrFail($id);
        return view('pacientes-edit')->with('paciente',$paciente);
    }

    public function update(Request $request){

        try{
            $paciente = Paciente::findOrFail($request->id);

        }
        catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }
        $paciente->nome = $request->nome;
        $paciente->cpf = preg_replace("/[^0-9]/", '', $request->cpf);
        $paciente->responsavel=preg_replace("/[^0-9]/", '', $request->responsavel);
        $paciente->email = $request->email;
        $paciente->logradouro = $request->logradouro;
        $paciente->numero = $request->numero;
        $paciente->complemento = $request->complemento;
        $paciente->bairro = $request->bairro;
        $paciente->cidade = $request->cidade;
        $paciente->uf = $request->uf;
        $paciente->pais = $request->pais;
        $paciente->cep = preg_replace("/[^0-9]/", '', $request->cep);

        try{
            $paciente->save();

        }
        catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }
        $array_nome = explode(' ',$request->nome);
        return redirect('/pacientes')->with('success',['As alterações no cadastro de '.$array_nome[0].' foram salvos']);

    }
}
