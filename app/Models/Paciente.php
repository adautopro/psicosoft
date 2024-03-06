<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function sync($id,$nome,$cpf,$email){
        $paciente = Paciente::where('notionid',$id)->first();
        if(!$paciente){
           $paciente = new Paciente();
           $paciente->notionid = $id;
        }
        $paciente->nome = $nome;
        $paciente->cpf = $cpf;
        $paciente->email = $email;
        $paciente->save();

        return true;


    }
}
