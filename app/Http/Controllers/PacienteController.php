<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use \Notion;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;


class PacienteController extends Controller
{
    const DATABASE_ID = "f30bc42f90ce4e0492e535961d0a6a58";

    public function sincronizar(){

        //$database = Notion::databases()->find(self::DATABASE_ID);
        //$collectionOfProperties = $database->getProperties();

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
               $nome = 'Undefined by error';
           }

           try{
               $cpf = $lista['rawProperties']['cpf']['rich_text'][0]['plain_text'];
           }
           catch (\Exception $e){
               $cpf = '00000000000';
           }
           try{
               $email = $lista['rawProperties']['email']['rich_text'][0]['plain_text'];
           }
           catch (\Exception $e){
               $email = $e->getMessage();
           }

           try{
               Paciente::sync($id,$nome,$cpf,$email);
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

    public function edit(int $id){
        $paciente = Paciente::findOrFail($id);
        return view('pacientes-edit')->with('paciente',$paciente);
    }

    public function update(Request $request){
        $array_nome = explode(' ',$request->nome);

        return redirect('/pacientes')->with('success',['As alterações no cadastro de '.$array_nome[0].' foram salvos']);

    }
}
