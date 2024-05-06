<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['notionid','nome'];

    public static function sync($id,$nome,$cpf){
        $paciente = Paciente::where('notionid',$id)->first();
        if(!$paciente){
           $paciente = new Paciente();
           $paciente->notionid = $id;
        }
        if($nome)
            $paciente->nome = $nome;
        else
            throw new  \Exception('sem nome');
        if($cpf)
            $paciente->cpf = $cpf;


        $paciente->save();

        return true;


    }
}
