<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use App\Models\Paciente;
use Illuminate\Http\Request;
use \Notion;

class NotaFiscalController extends Controller
{
    const DATABASE_ID = "f30bc42f90ce4e0492e535961d0a6a58";
    public function index()
    {
        $notas = NotaFiscal::all();
        return view('notas')->with('notas', $notas);
    }

    public function create(){
        /*$objeto = new NotaFiscal();
        $colunas = \Illuminate\Support\Facades\Schema::getColumnListing($objeto->getTable());
        $escreva='';
        foreach($colunas as $value){
            $escreva .= '$nota->'.$value.' = $request->'.$value.';</br>';
        }
        return $escreva;*/
        return view('notas-new');
    }

    public function store(Request $request){

        $nota = new NotaFiscal();
        if(!empty($request->nota))
            $nota->id = $request->nota;
        $nota->valor = $request->valor;
        $nota->ano = $request->ano;
        $nota->mes = $request->mes;
        $nota->descricao = $request->descricao;
        $nota->link = $request->link;
        $nota->emissao = $request->emissao;
        $nota->status = $request->status;
        $nota->paciente_id = $request->paciente_id;

        try{
            $nota->save();
        }
        catch(\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect('/notas')->with('alerts',['success'=>['Nota salva']]);

    }
    public function importarNotion ($mes,$ano,$numero_nota)
    {
        if($mes == '00' || !is_numeric($mes) || $numero_nota == '0' || !is_numeric($numero_nota))
            return response("Nota ou Mês inválidos",400);
        $qnde = array("Nenhuma", "Uma", "Duas", "Três", "Quatro", "Cinco", "Seis", "Sete", "Oito", "Nove", "Dez", "Onze", "Doze", "Treze", "Quatorze", "Quinze");



        $database = Notion::database(self::DATABASE_ID)
            ->query()
            ->asCollection();

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
                $descricao = $qnde[count($sessoes)] . ' (' . count($sessoes) . ') ' . (count($sessoes) > 1 ? 'sess&#245;es' : 'sess&#227;o') . ' de psicoterapia realizada' . $plural . ' no' . $plural . ' dia' . $plural . ':' . "\n" . $end_desc;
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
                $total = $lista['rawProperties']["Total"]["number"];
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
                $nota->save();

                $numero_nota++;

            }


        }
        return response('Importado',200);
    }
    public function gerarArquivo($ids){
        //https://www.php.net/manual/en/example.xmlwriter-simple.php
        $arr_ids = explode(',',$ids);
        $notas = NotaFiscal::whereIn('id',$arr_ids)->get();
        $xw = xmlwriter_open_memory();
        xmlwriter_set_indent($xw, 1);
        $res = xmlwriter_set_indent_string($xw, ' ');
        xmlwriter_start_document($xw, '1.0', 'utf-8');
        // A first element
        xmlwriter_start_element($xw, 'nfe');

        foreach($notas as $nota){
            $pessoa = Paciente::find($nota->paciente_id);
            if($pessoa->responsavel)
                $paciente = Paciente::where('cpf',$pessoa->responsavel)->first();
            else
                $paciente = $pessoa;

                //Início da nota
                xmlwriter_start_element($xw, 'notafiscal');

                    // DadosPrestador
                    xmlwriter_start_element($xw, 'dadosprestador');

                        //NUmeroNota
                        xmlwriter_start_element($xw, 'numeronota');
                        xmlwriter_text($xw, $nota->id);
                        xmlwriter_end_element($xw); // NumeroNota

                        //IM
                        xmlwriter_start_element($xw, 'im');
                        xmlwriter_text($xw, '101825');
                        xmlwriter_end_element($xw);

                        //Emissão
                        xmlwriter_start_element($xw, 'dataemissao');
                        xmlwriter_text($xw, $nota->emissao);
                        xmlwriter_end_element($xw);

                    xmlwriter_end_element($xw); // dadosprestador

                    // DadosTomador
                    xmlwriter_start_element($xw, 'dadostomador');
                        //IE
                        xmlwriter_start_element($xw, 'ie');
                        xmlwriter_text($xw, ' ');
                        xmlwriter_end_element($xw);

                        //tipo
                        xmlwriter_start_element($xw, 'tipodoc');
                        xmlwriter_text($xw, 'F');
                        xmlwriter_end_element($xw); // tipoDocPrestador

                        if ($paciente->logradouro != null) {
                            //dd($paciente);


                            //documento
                            xmlwriter_start_element($xw, 'documento');
                            xmlwriter_text($xw, $paciente->cpf);
                            xmlwriter_end_element($xw);

                            //email
                            xmlwriter_start_element($xw, 'email');
                            xmlwriter_text($xw, $paciente->email);
                            xmlwriter_end_element($xw);


                            //nome
                            xmlwriter_start_element($xw, 'nometomador');
                            xmlwriter_text($xw, ($paciente->nome));
                            xmlwriter_end_element($xw);

                            //logradouro
                            xmlwriter_start_element($xw, 'logradouro');
                            xmlwriter_text($xw, ($paciente->logradouro));
                            xmlwriter_end_element($xw);

                            //numero
                            xmlwriter_start_element($xw, 'numero');
                            xmlwriter_text($xw, $paciente->numero);
                            xmlwriter_end_element($xw);

                            //complemento
                            xmlwriter_start_element($xw, 'complemento');
                            xmlwriter_text($xw, ($paciente->complemento));
                            xmlwriter_end_element($xw);

                            //bairro
                            xmlwriter_start_element($xw, 'bairro');
                            xmlwriter_text($xw, ($paciente->bairro));
                            xmlwriter_end_element($xw);

                            //cidade
                            xmlwriter_start_element($xw, 'cidade');
                            xmlwriter_text($xw, ($paciente->cidade));
                            xmlwriter_end_element($xw);

                            //uf
                            xmlwriter_start_element($xw, 'uf');
                            xmlwriter_text($xw, $paciente->uf);
                            xmlwriter_end_element($xw);

                            //pais
                            xmlwriter_start_element($xw, 'pais');
                            xmlwriter_text($xw, $paciente->pais);
                            xmlwriter_end_element($xw);

                            //cep
                            xmlwriter_start_element($xw, 'cep');
                            xmlwriter_text($xw, $paciente->cep);
                            xmlwriter_end_element($xw);


                        }
                        else{
                            $nota->descricao.= '['.$paciente->nome.']';

                            //documento
                            xmlwriter_start_element($xw, 'documento');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //email
                            xmlwriter_start_element($xw, 'email');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);


                            //nome
                            xmlwriter_start_element($xw, 'nometomador');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);
                            //logradouro
                            xmlwriter_start_element($xw, 'logradouro');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //numero
                            xmlwriter_start_element($xw, 'numero');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //complemento
                            xmlwriter_start_element($xw, 'complemento');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //bairro
                            xmlwriter_start_element($xw, 'bairro');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //cidade
                            xmlwriter_start_element($xw, 'cidade');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //uf
                            xmlwriter_start_element($xw, 'uf');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //pais
                            xmlwriter_start_element($xw, 'pais');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                            //cep
                            xmlwriter_start_element($xw, 'cep');
                            xmlwriter_text($xw, ' ');
                            xmlwriter_end_element($xw);

                        }
                    xmlwriter_end_element($xw); // dadosTomador



                    //dadosservico
                    xmlwriter_start_element($xw, 'dadosservico');

                        //pais
                        xmlwriter_start_element($xw, 'pais');
                        xmlwriter_text($xw, 'BRASIL');
                        xmlwriter_end_element($xw);

                        //endereco
                        xmlwriter_start_element($xw, 'logradouro');
                        xmlwriter_text($xw, 'RUA IRINEU GABRIEL FLORINDO');
                        xmlwriter_end_element($xw);

                        //numero
                        xmlwriter_start_element($xw, 'numero');
                        xmlwriter_text($xw, '85');
                        xmlwriter_end_element($xw);

                        //complemento
                        xmlwriter_start_element($xw, 'complemento');
                        xmlwriter_text($xw, 'LPR');
                        xmlwriter_end_element($xw);

                        //bairro
                        xmlwriter_start_element($xw, 'bairro');
                        xmlwriter_text($xw, 'JARDIM ARAUCARIA');
                        xmlwriter_end_element($xw);

                        //municipio
                        xmlwriter_start_element($xw, 'cidade');
                        //xmlwriter_text($xw, ('S&#227;o Carlos'));
                        xmlwriter_text($xw, ('Sao Carlos'));
                        xmlwriter_end_element($xw);

                        //uf
                        xmlwriter_start_element($xw, 'uf');
                        xmlwriter_text($xw, 'SP');
                        xmlwriter_end_element($xw);

                        //cep
                        xmlwriter_start_element($xw, 'cep');
                        xmlwriter_text($xw, '13562834');
                        xmlwriter_end_element($xw);

                    xmlwriter_end_element($xw);//dadosservico

                    //detalheservico
                    xmlwriter_start_element($xw, 'detalheservico');
                        xmlwriter_start_element($xw, 'item');
                            //Descricao
                            xmlwriter_start_element($xw, 'descricao');
                            xmlwriter_text($xw, ($nota->descricao));
                            xmlwriter_end_element($xw);
                            //valor
                            xmlwriter_start_element($xw, 'valor');
                            xmlwriter_text($xw, $nota->valor);
                            xmlwriter_end_element($xw);
                            //valor
                            xmlwriter_start_element($xw, 'codigo');
                            xmlwriter_text($xw, '416');
                            xmlwriter_end_element($xw);

                        xmlwriter_end_element($xw);//item

                    xmlwriter_end_element($xw); // detalheservico

                xmlwriter_end_element($xw); // notafiscal
        }//foreach

        xmlwriter_end_element($xw); // Nfse
        xmlwriter_end_element($xw); // Nfse
        xmlwriter_end_document($xw);

        //return xmlwriter_output_memory($xw);

        header('Content-type: text/xml; charset=utf-8');
        header('Content-Disposition: attachment');
        return response(xmlwriter_output_memory($xw),200)->header('Content-Type', 'application/xml','charset=utf-8');


        /*

            <Atividade>416</Atividade>
            <DataEmissao>12/10/2019</DataEmissao>
            <DataCompetencia>12/10/2019</DataCompetencia>
            <ValorNf>1000.52</ValorNf>
            <ValorAbatimento> </ValorAbatimento>
            <ValorBaseCalculo>1000.52</ValorBaseCalculo>
            <Aliquota>2</Aliquota>
            <DescricaoObservacao>
              teste
            </DescricaoObservacao>
            <GeraGuiaTributacao>S</GeraGuiaTributacao>
          </EmissaoNotaTomada>
         */

    }
}
