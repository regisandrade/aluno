<?php
// Lib FPDF
define('FPDF_FONTPATH','lib/fpdf/font/');
require_once "lib/fpdf/fpdf.php";

require_once "class/notasFrequencias.class.php";
require_once "class/turma.class.php";

class GerarCurriculo extends FPDF{

  function Header(){
    // Logo
    $this->Image('imagens/logoNovoIpecon.jpg',10,6,100);
    // Font
    $this->SetFont('helvetica','',18);

    $this->Cell(40,8, '', 0, 0);
    $this->MultiCell(160,8, "IPECON - Instituto de Organização de Eventos, Ensino e Consultoria S/S Ltda.\r
      Av. T-4, nº 1.478, Edf. Absolut Business Style, sala A-132 (13º andar).\r
      Setor Bueno, Goiânia/GO - CEP: 74.230-030\r
      Fone/Fax: (0xx62) 3214-3229\r
      ipecon@ipecon.com.br", 0, 'C');

    $this->SetFont('helvetica','B',18);
    $this->Cell(200,8, 'D E C L A R A Ç Ã O', 0, 1, 'C');
  }

  function Conteudo(){
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

    $conteudo  = "Declaramos para os devidos fins que ".strtoupper($_SESSION['nomeAluno'])." ".$frase1." Curso de Pós Graduação em ";
    $conteudo .= strtoupper($_SESSION['nomeCurso']).", ministrado por este IPECON - Instituto de Organização de Eventos, Ensino e Consultoria S/S Ltda, ";
    $conteudo .= "em parceria com a Pontifícia Universidade Católica de Goiás - PUC GO, ".$frase2."as seguintes disciplinas, conforme histórico abaixo: ";

    $this->MultiCell(160,8, $conteudo, 0, 'C');

    $this->SetFont('helvetica','B',12);
    $this->Cell(120,8, 'Disciplina', 0, 0, 'C');
    $this->Cell(800,8, 'Nota', 0, 1, 'C');

    $this->SetFont('helvetica','',12);

    /* Buscando as notas e frequencia */
    $notasFrequenciasDAO = new NotasFrequencias();

    $parametros['ano']      = $_SESSION['ano'];
    $parametros['turma']    = $_SESSION['turma'];
    $parametros['idNumero'] = $_SESSION['idNumero'];
    $listaNotasFrequencias  = $notasFrequenciasDAO->pesquisar($bd,$parametros);
    unset($parametros);

    foreach ($listaNotasFrequencias as $value) {
      $this->Cell(120,8, $value['disciplina'], 0, 0, 'C');
      $this->Cell(80,8, $value['nota'], 0, 1, 'C');
    }

    $this->Ln(15);
    $this->Cell(200,8, 'Por ser verdade, firmamos o presente documento.', 0, 1, 'C');
    $this->Image('imagens/assinatura_digital.jpg',10,6,100);
    $this->Cell(200,8, 'Goiânia, '.date('d/m/Y'), 0, 1, 'C');

  }

  function Footer(){}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Conteudo();
$pdf->SetFont('Times','',12);
$pdf->Output('declaracaoParaCurriculo-IPECON.pdf','I');