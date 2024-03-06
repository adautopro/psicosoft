<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use \Notion;

class NotaFiscalController extends Controller
{
    const DATABASE_ID = "f30bc42f90ce4e0492e535961d0a6a58";
    public function gerar(){
        $qnde = array("", "Uma", "Duas", "Três", "Quatro", "Cinco", "Seis","Sete", "Oito", "Nove", "Dez", "Onze","Doze", "Treze","Quatorze","Quinze");
        //https://www.php.net/manual/en/example.xmlwriter-simple.php
        $numero_nota = 67;

        $xw = xmlwriter_open_memory();
        xmlwriter_set_indent($xw, 1);
        $res = xmlwriter_set_indent_string($xw, ' ');
        xmlwriter_start_document($xw, '1.0', 'UTF-8');
        // A first element
        xmlwriter_start_element($xw, 'Nfse');


        $database = Notion::database(self::DATABASE_ID)
            ->query()
            ->asCollection();

        foreach($database as $item) {
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
            $total=0;
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
                foreach ($lista['rawProperties']['2024-02']["multi_select"] as $sessao) {
                    $sessoes[] = $sessao['name'];
                    $end_desc .= '        ' . $sessao['name'] . '/2024 de forma on-line pela Dra. Larissa Pires Ruiz. CRP 06/12575583.' . "\n";

                }
                $descricao = $qnde[count($sessoes)] . ' (' . count($sessoes) . ') sessão(ões) de psicoterapia realizadas no(s) dia(s):' . "\n" . $end_desc;
            }
            catch(\Exception $e){
                $descricao = $e->getMessage();
            }
            try {
                $valor_sessao =  $lista['rawProperties']["Valor Sessão"]["number"];
            } catch (\Exception $e) {
                $valor_sessao =  0;
            }
            try {
                $valor_fixo =  $lista['rawProperties']["Valor Fixo"]["number"];
            } catch (\Exception $e) {
                $valor_fixo = 0;
            }
            try {
                $qnde_sessoes_fixo =  $lista['rawProperties']["Qnde Sessões Fixas"]["number"];
            } catch (\Exception $e) {
                $qnde_sessoes_fixo =  0;
            }


            $total = (count($sessoes)-$qnde_sessoes_fixo)*$valor_sessao+$valor_fixo;




            $paciente = Paciente::where('notionid',$id)->first();
            if($paciente && $total>0) {


                xmlwriter_start_element($xw, 'EmissaoNotaTomada');

                //NUmeroNota
                xmlwriter_start_element($xw, 'NumeroNota');
                xmlwriter_text($xw, $numero_nota);
                xmlwriter_end_element($xw); // NumeroNota

                // DadosPrestador
                xmlwriter_start_element($xw, 'DadosPrestador');

                //tipo
                xmlwriter_start_element($xw, 'TipoPrestador');
                xmlwriter_text($xw, 'J');
                xmlwriter_end_element($xw); // tipoDocPrestador

                //documento
                xmlwriter_start_element($xw, 'documento');
                xmlwriter_text($xw, '52163055000116');
                xmlwriter_end_element($xw);

                //IM
                xmlwriter_start_element($xw, 'im');
                xmlwriter_text($xw, '101825');
                xmlwriter_end_element($xw);

                //razaoSocial
                xmlwriter_start_element($xw, 'razaoSocial');
                xmlwriter_text($xw, 'LPR SAUDE LTDA');
                xmlwriter_end_element($xw);

                //endereco
                xmlwriter_start_element($xw, 'endereco');
                xmlwriter_text($xw, 'RUA IRINEU GABRIEL FLORINDO');
                xmlwriter_end_element($xw);

                //numero
                xmlwriter_start_element($xw, 'numero');
                xmlwriter_text($xw, '85');
                xmlwriter_end_element($xw);

                //bairro
                xmlwriter_start_element($xw, 'bairro');
                xmlwriter_text($xw, 'JARDIM ARAUCARIA');
                xmlwriter_end_element($xw);

                //municipio
                xmlwriter_start_element($xw, 'municipio');
                xmlwriter_text($xw, 'São Carlos');
                xmlwriter_end_element($xw);

                //uf
                xmlwriter_start_element($xw, 'uf');
                xmlwriter_text($xw, 'SP');
                xmlwriter_end_element($xw);

                //cep
                xmlwriter_start_element($xw, 'cep');
                xmlwriter_text($xw, '13562834');
                xmlwriter_end_element($xw);

                //tel
                xmlwriter_start_element($xw, 'tel');
                xmlwriter_text($xw, '16992227784');
                xmlwriter_end_element($xw);

                xmlwriter_end_element($xw); // dadosPrestador

                // DadosTomador
                xmlwriter_start_element($xw, 'DadosTomador');
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


                        //razaoSocia
                        xmlwriter_start_element($xw, 'razaoSocia');
                        xmlwriter_text($xw, $paciente->nome);
                        xmlwriter_end_element($xw);

                        //logradouro
                        xmlwriter_start_element($xw, 'logradouro');
                        xmlwriter_text($xw, $paciente->logradouro);
                        xmlwriter_end_element($xw);

                        //numero
                        xmlwriter_start_element($xw, 'numero');
                        xmlwriter_text($xw, $paciente->numero);
                        xmlwriter_end_element($xw);

                        //complemento
                        xmlwriter_start_element($xw, 'complemento');
                        xmlwriter_text($xw, $paciente->complemento);
                        xmlwriter_end_element($xw);

                        //bairro
                        xmlwriter_start_element($xw, 'bairro');
                        xmlwriter_text($xw, $paciente->bairro);
                        xmlwriter_end_element($xw);

                        //cidade
                        xmlwriter_start_element($xw, 'cidade');
                        xmlwriter_text($xw, $paciente->cidade);
                        xmlwriter_end_element($xw);

                        //uf
                        xmlwriter_start_element($xw, 'uf');
                        xmlwriter_text($xw, $paciente->uf);
                        xmlwriter_end_element($xw);

                        //cep
                        xmlwriter_start_element($xw, 'cep');
                        xmlwriter_text($xw, $paciente->cep);
                        xmlwriter_end_element($xw);


                    }
                    else{
                        $descricao.= '['.$paciente->nome.']';
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

                        //cep
                        xmlwriter_start_element($xw, 'cep');
                        xmlwriter_text($xw, ' ');
                        xmlwriter_end_element($xw);

                    }




                xmlwriter_end_element($xw); // dadosTomador

                //atividade
                xmlwriter_start_element($xw, 'Atividade');
                xmlwriter_text($xw, '416');
                xmlwriter_end_element($xw);

                //Emissão
                xmlwriter_start_element($xw, 'DataEmissao');
                xmlwriter_text($xw, '04/03/2024');
                xmlwriter_end_element($xw);

                //Competência
                xmlwriter_start_element($xw, 'DataCompetencia');
                xmlwriter_text($xw, '29/02/2024');
                xmlwriter_end_element($xw);

                //Valor NOta
                xmlwriter_start_element($xw, 'ValorNf');
                xmlwriter_text($xw, $total);
                xmlwriter_end_element($xw);

                //Abatimento
                xmlwriter_start_element($xw, 'ValorAbatimento');
                xmlwriter_text($xw, ' ');
                xmlwriter_end_element($xw);

                //Base Cálculo
                xmlwriter_start_element($xw, 'ValorBaseCalculo');
                xmlwriter_text($xw, $total);
                xmlwriter_end_element($xw);

                //Aliquota
                xmlwriter_start_element($xw, 'Aliquota');
                xmlwriter_text($xw, '2');
                xmlwriter_end_element($xw);

                //DescricaoObservacao
                xmlwriter_start_element($xw, 'DescricaoObservacao');
                xmlwriter_text($xw, $descricao);
                xmlwriter_end_element($xw);

                //GeraGuiaTributacao
                xmlwriter_start_element($xw, 'GeraGuiaTributacao');
                xmlwriter_text($xw, 'S');
                xmlwriter_end_element($xw);


                xmlwriter_end_element($xw); // EmissaoNotaTomada
                $numero_nota++;
            }

        }
        xmlwriter_end_element($xw); // Nfse
        xmlwriter_end_document($xw);

        return response(xmlwriter_output_memory($xw),200)->header('Content-Type', 'application/xml');


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
