<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class NotaFiscal extends Model
{
    use HasFactory;
    protected $table = 'notas_fiscais';
    protected $fillable = ['id'];
    protected $casts = [
        'emissao' => 'datetime:d/m/Y'

    ];

    public function getNome(){
        $paciente = Paciente::findOrFail($this->paciente_id);
        return $paciente->nome;
    }
}
