<?php
session_start();

require_once "../../lib/myDB.class.php";
$bd = new myDB();

// Lib FPDF
define('FPDF_FONTPATH','../../lib/fpdf/font/');
require_once "../../lib/fpdf/fpdf.php";

require_once "../class/notasFrequencias.class.php";
require_once "../class/turma.class.php";

class GerarDeclaracaoCurriculo extends FPDF{

  function Header(){
    // Logo
    $this->Image('../imagens/logoNovoIpecon.jpg',10,10,35);
    // Font
    $this->SetFont('helvetica','',10);

    $this->Cell(40,5, '', 0, 0);
    $this->Cell(160,5, utf8_decode("IPECON - Instituto de Organização de Eventos, Ensino e Consultoria S/S Ltda."), 0, 1, 'C');
    $this->Cell(40,5, '', 0, 0);
    $this->Cell(160,5, utf8_decode("Av. T-4, nº 1.478, Edf. Absolut Business Style, sala A-132 (13º andar)."), 0, 1, 'C');
    $this->Cell(40,5, '', 0, 0);
    $this->Cell(160,5, utf8_decode("Setor Bueno, Goiânia/GO - CEP: 74.230-030"), 0, 1, 'C');
    $this->Cell(40,5, '', 0, 0);
    $this->Cell(160,5, "Fone/Fax: (0xx62) 3214-3229", 0, 1, 'C');
    $this->Cell(40,5, '', 0, 0);
    $this->Cell(160,5, "ipecon@ipecon.com.br", 0, 1, 'C');

    $this->SetFont('helvetica','B',18);
    $this->Ln(15);
    $this->Cell(200,8, utf8_decode('D E C L A R A Ç Ã O'), 0, 1, 'C');
    $this->Ln(10);
  }

  function Conteudo($bd){
    $this->SetFont('helvetica','',12);

    /* Buscando as datas da turma */
    $turmaDAO = new Turma();

    $parametros['turma'] = $_SESSION['turma'];
    $listaDatas = $turmaDAO->pesquisarDataInicialFinal($bd,$parametros);
    unset($parametros);

    if (is_array($listaDatas)) {
      $listaDatas = current($listaDatas);
    }

    $arrayDataFinal = explode("/", $listaDatas['Data_Final']);
    $dtFinal = $arrayDataFinal['2'].$arrayDataFinal['1'].$arrayDataFinal['0'];

    $frase1 = " está regularmente matriculado(a) no ";
    $frase2 = " tendo cursado, até o momento, ";
    if(date('Ymd') > $dtFinal){
        $frase1 = " concluiu o ";
        $frase2 = "";
    }

    $conteudo  = "Declaramos para os devidos fins que ".strtoupper($_SESSION['nomeAluno'])." ".$frase1." Curso de Pós Graduação em ".strtoupper($_SESSION['nomeCurso']).", ministrado por este IPECON - Instituto de Organização de Eventos, Ensino e Consultoria S/S Ltda, em parceria com a Pontifícia Universidade Católica de Goiás - PUC GO, ".$frase2."as seguintes disciplinas, conforme histórico abaixo: ";

    $this->MultiCell(200,5, utf8_decode($conteudo), 0, 'J');

    $this->Ln(5);

    $this->SetFont('helvetica','B',12);
    $this->Cell(120,5, 'Disciplina', 'B', 0, 'L');
    $this->Cell(80,5, 'Nota', 'B', 1, 'C');

    $this->SetFont('helvetica','',12);

    /* Buscando as notas e frequencia */
    $notasFrequenciasDAO = new NotasFrequencias();

    $parametros['ano']      = $_SESSION['ano'];
    $parametros['turma']    = $_SESSION['turma'];
    $parametros['idNumero'] = $_SESSION['idNumero'];
    $listaNotasFrequencias  = $notasFrequenciasDAO->pesquisar($bd,$parametros);
    unset($parametros);

    foreach ($listaNotasFrequencias as $value) {
      $this->Cell(120,5, utf8_decode($value['disciplina']), 0, 0, 'L');
      $this->Cell(80,5, $value['nota'], 0, 1, 'C');
    }

    $this->Cell(200,1, '', 'T', 1);

    $this->Ln(15);
    $this->Cell(200,5, 'Por ser verdade, firmamos o presente documento.', 0, 1, 'C');
    $this->Image('../imagens/assinatura_digital.jpg',90,185,35);
    $this->Cell(200,5, utf8_decode('Goiânia, ').date('d/m/Y'), 0, 1, 'C');

  }

  //function Footer(){}
}

$pdf = new GerarDeclaracaoCurriculo();
$pdf->Open();
$pdf->AddPage();
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);
$pdf->Conteudo($bd);
$pdf->Output("declaracaoCurriculo_".date(dmY).".pdf","I");
?>