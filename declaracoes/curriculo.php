<?php
session_start();
require('../../conexao.inc.php');
//== Consulta das notas do aluno
$cmd_nota = "
SELECT
	AC.Nota,
	DIS.Nome AS Disciplina
FROM
	alunos_academicos AC
INNER JOIN disciplina DIS ON
	DIS.Codg_Disciplina = AC.Disciplina AND
	AC.Turma = '".$_SESSION['turma']."'
WHERE
	AC.Aluno = '".$_SESSION['id_numero']."' AND AC.Nota <> 0";
$res_nota = mysql_query($cmd_nota) or die('Erro na consulta das Notas. '.mysql_error());

$cmd_turma = "SELECT DISTINCT  DATE_FORMAT(T.Data_Inicial,'%d/%m/%Y') AS Data_Inicial,
                    DATE_FORMAT(T.Data_Final,'%d/%m/%Y') AS Data_Final
                FROM turma T
                WHERE T.Turma = '".$_SESSION['turma']."'";
$res_turma = mysql_query($cmd_turma) or die('Erro na consulta da Turma. ');
$reg_turma = mysql_fetch_array($res_turma);

$arrayDataFinal = explode("/", $reg_turma['Data_Final']);
$dtFinal = $arrayDataFinal['2'].$arrayDataFinal['1'].$arrayDataFinal['0'];
$frase1 = " está regularmente matriculado(a) no ";
$frase2 = " tendo cursado, até o momento, ";
if(date('Ymd') > $dtFinal){
    $frase1 = " concluiu o ";
    $frase2 = "";
}
?>
<html>
<head>
<title>.: IPECON Ensino e Consultoria :.</title>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" onLoad="JavaScript:window.print();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="137" align="center" valign="top"><img src="../../imagens/logo_email_ipecon.gif" width="127" height="30"></td>
    <td width="363" align="center" valign="top"><font size="1" face="Verdana">IPECON - Instituto
      de Organiza&ccedil;&atilde;o de Eventos, Ensino e Consultoria S/S Ltda.<br>
      Rua 10 n&ordm; 250, Edf. Trade Center - Setor Oeste.<br>
      Fone/Fax: (0xx62) 3214-3229, CEP: 74.120-020, Goi&acirc;nia-Go<br>
      ipecon@ipecon.com.br</font></td>
  </tr>
  <tr align="right" valign="bottom">
    <td height="35" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><u><font size="3" face="Verdana"><strong>DECLARA&Ccedil;&Atilde;O</strong></font></u></td>
  </tr>
  <tr>
    <td height="35" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"style="text-align:justify"><p><font size="2" face="Verdana">Declaramos para os devidos
        fins que <strong><?php echo strtoupper($_SESSION['nome'])?></strong>
        <?php echo $frase1; ?> curso de P&oacute;s Gradua&ccedil;&atilde;o
        em &quot;<strong><?php echo substr(strtoupper($_SESSION['nomeCurso']),7)?></strong>&quot;,
        ministrado por este IPECON - Instituto de Organiza&ccedil;&atilde;o de
        Eventos, Ensino e Consultoria S/S Ltda, em parceria com a Pontifícia Universidade Católica de Goiás - PUC GO, <?php echo $frase2; ?>
        as seguintes disciplinas, conforme hist&oacute;rico abaixo:</font></p>
      <p>&nbsp;</p>
      <table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
        <tr align="center">
          <td width="79%"><font size="2" face="Verdana"><strong>DISCIPLINAS</strong></font></td>
          <td width="21%"><font size="2" face="Verdana"><strong>NOTAS</strong></font></td>
        </tr>
		<?php
		while($reg_nota = mysql_fetch_array($res_nota)){
		?>
        <tr>
          <td width="79%" style="padding-left: 0.3em"><font size="2" face="Verdana"><?php echo $reg_nota['Disciplina']; ?></font></td>
          <td width="21%" style="padding-left: 0.3em"><font size="2" face="Verdana"><?php echo $reg_nota['Nota']; ?></font></td>
        </tr>
		<?php
		}
		?>
      </table>
      <p>&nbsp;</p>
      <p><font size="2" face="Verdana">Por ser verdade, firmamos o presente documento.</font></p></td>
  </tr>
  <tr align="center" valign="bottom">
    <td height="100" colspan="2"><img src="../imagens/assinatura_digital.jpg" width="185" height="82"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr align="right">
    <td colspan="2"><font size="2" face="Verdana">Goi&acirc;nia,<?php echo date('d/m/Y'); ?>.</font></td>
  </tr>
</table>
</body>
</html>
