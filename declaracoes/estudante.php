<?php
session_start();

require_once "../../lib/myDB.class.php";
$bd = new myDB();

// Lib FPDF
define('FPDF_FONTPATH','../../lib/fpdf/font/');
require_once "../../lib/fpdf/fpdf.php";

require_once "../class/turma.class.php";

class GerarDeclaracaoEstudante extends FPDF{

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

    $frase1 = " está matriculado(a) no ";
    $frase2 = " está sendo ministrado no período ";
    if(date('Ymd') > $dtFinal){
        $frase1 = " concluiu o ";
        $frase2 = " foi ministrado ";
    }

    $conteudo  = "Declaramos para os devidos fins que ".strtoupper($_SESSION['nomeAluno'])." ".$frase1." Curso de Pós Graduação em ".strtoupper($_SESSION['nomeCurso']).", ministrado por este IPECON - Instituto de Organização de Eventos, Ensino e Consultoria S/S Ltda, em parceria com a Pontifícia Universidade Católica de Goiás - PUC GO.";

    $this->MultiCell(200,5, utf8_decode($conteudo), 0, 'J');

    $this->Cell(200,5, 'Informamos ainda que o curso '.$frase2.' de '.$reg_consulta['Data_Inicial'].' a '.$reg_consulta['Data_FInal'], 0, 1, 'L');

    $this->Ln(15);
    $this->Cell(200,5, 'Por ser verdade, firmamos o presente documento.', 0, 1, 'C');
    $this->Image('../imagens/assinatura_digital.jpg',90,115,35);
    $this->Cell(200,5, utf8_decode('Goiânia, ').date('d/m/Y'), 0, 1, 'C');

  }

  //function Footer(){}
}

$pdf = new GerarDeclaracaoEstudante();
$pdf->Open();
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);
$pdf->AddPage();
$pdf->Conteudo($bd);
$pdf->Output("declaracaoEstudante_".date(dmY).".pdf","I");
?>