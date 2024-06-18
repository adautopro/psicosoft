<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use App\Models\Paciente;
use Illuminate\Http\Request;
use \Notion;

class NotaFiscalNotionController extends Controller
{
    const DATABASE_ID = "f30bc42f90ce4e0492e535961d0a6a58";

    public function importarNotion ($mes,$ano,$numero_nota)
    {
        if($mes == '00' || !is_numeric($mes) || $numero_nota == '0' || !is_numeric($numero_nota))
            return response("Nota ou Mês inválidos",400);
        $qnde = array("Nenhuma", "Uma", "Duas", "Três", "Quatro", "Cinco", "Seis", "Sete", "Oito", "Nove", "Dez", "Onze", "Doze", "Treze", "Quatorze", "Quinze");



        $database = Notion::database(self::DATABASE_ID)
            ->query()
            ->asCollection();
        $msg ='<ol>';
        foreach ($database as $item) {
            $nome = '';
            $cpf = '';
            $logradouro = ' ';
            $numero = ' ';
            $complemento = ' ';
            $bairro = ' ';
            $cidade = ' ';
            $uf = ' ';
            $cep = ' ';
            $email = '';
            $total = 0;
            $descricao = '   ';
            $end_desc = '';
            $sessoes = [];


            $lista = $item->toArray();
            $id = $item->getId();
            try {
                $nome = $lista['rawProperties']['Name']['title'][0]['plain_text'];
            } catch (\Exception $e) {
                $nome = 'Undefined by error';
            }
            try {
                foreach ($lista['rawProperties'][$ano.'-'.$mes]["multi_select"] as $sessao) {
                    $sessoes[] = $sessao['name'];
                    $end_desc .= '        ' . $sessao['name'] . '/2024 de forma on-line pela Dra. Larissa Pires Ruiz. CRP 06/12575583.' . "\n";

                }
                if (count($sessoes) > 1)
                    $plural = 's';
                else
                    $plural = '';
                //$descricao = $qnde[count($sessoes)] . ' (' . count($sessoes) . ') ' . (count($sessoes) > 1 ? 'sess&#245;es' : 'sess&#227;o') . ' de psicoterapia realizada' . $plural . ' no' . $plural . ' dia' . $plural . ':' . "\n" . $end_desc;
                $descricao = $qnde[count($sessoes)] . ' (' . count($sessoes) . ') ' . (count($sessoes) > 1 ? 'sessões' : 'sessão') . ' de psicoterapia realizada' . $plural . ' no' . $plural . ' dia' . $plural . ':' . "\n" . $end_desc;

            } catch (\Exception $e) {
                $descricao = $e->getMessage();
            }
            try {
                $valor_sessao = $lista['rawProperties']["Valor Sessão"]["number"];
            } catch (\Exception $e) {
                $valor_sessao = 0;
            }
            try {
                $valor_fixo = $lista['rawProperties']["Valor Fixo"]["number"];
            } catch (\Exception $e) {
                $valor_fixo = 0;
            }
            try {
                $qnde_sessoes_fixo = $lista['rawProperties']["Qnde Sessões Fixas"]["number"];
            } catch (\Exception $e) {
                $qnde_sessoes_fixo = 0;
            }

            try {
                $total = $lista['rawProperties']["Valor NF"]["formula"]["number"];
            } catch (\Exception $e) {
                $total = 0;
            }



            $paciente = Paciente::firstOrCreate(['notionid'=>$id,'nome'=>$nome]);


            if($total>0){
                $nota = NotaFiscal::firstOrNew(['id' => $numero_nota]);
                $nota->valor = $total;
                $nota->ano = $ano;
                $nota->mes = $mes;
                $nota->descricao = $descricao;
                $nota->paciente_id = $paciente->id;

                try {
                    $nota->save();
                    $msg .='<li>nota '.$nota->id.' salva.</li>';

                }
                catch(Exeptions $exeptions){
                    $msg .='<li>nota '.$nota->id.' ERRO:'.$exeptions->getMessage().'</li>';
                }

                $numero_nota++;



            }


        }
        $msg .='</ol>';
        return response($msg,200);
    }
}
