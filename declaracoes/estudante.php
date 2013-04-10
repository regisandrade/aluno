<?php
session_start();
require_once('../../conexao.inc.php');
$cmd_consulta = "SELECT DISTINCT  DATE_FORMAT(T.Data_Inicial,'%d/%m/%Y') AS Data_Inicial,  
                    DATE_FORMAT(T.Data_Final,'%d/%m/%Y') AS Data_Final,
                    C.Codg_Curso AS CodgCurso,  C.Nome AS NomeCurso
                FROM turma T
                INNER JOIN curso C ON C.Codg_Curso = T.Curso
                WHERE T.Turma = '".$_SESSION['turma']."'";
$res_consulta = mysql_query($cmd_consulta) or die('Erro na consulta da Turma. ');
$reg_consulta = mysql_fetch_array($res_consulta);

$arrayDataFinal = explode("/", $reg_consulta['Data_Final']);
$dtFinal = $arrayDataFinal['2'].$arrayDataFinal['1'].$arrayDataFinal['0'];
$frase1 = " está matriculado(a) no ";
$frase2 = " está sendo ministrado no período ";
if(date('Ymd') > $dtFinal){
    $frase1 = " concluiu o ";
    $frase2 = " foi ministrado ";
}
?>
<html>
    <head>
        <title>.: IPECON Ensino e Consultoria :.</title>
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" onLoad="JavaScript:window.print();">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="137" align="center" valign="top"><img src="../../imagens/logoNovoIpecon.jpg" width="135" /></td>
                <td width="363" align="center" valign="top"><font size="1" face="Verdana">
                    IPECON - Instituto      de Organiza&ccedil;&atilde;o de Eventos, Ensino e Consultoria S/S Ltda.<br>
                    Av. T-4, n&ordm; 1.478, Edf. Absolut Business Style, sala A-132 (13&ordm; andar).<br>
                    Setor Bueno, Goi&acirc;nia/GO - CEP: 74.230-030<br>
                    Fone/Fax: (0xx62) 3214-3229<br>
                    ipecon@ipecon.com.br</font></td>
            </tr>
            <tr>
                <td height="35" colspan="2" align="center">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><u><font size="3" face="Verdana"><strong>DECLARA&Ccedil;&Atilde;O</strong></font></u></td>
            </tr>
            <tr>
                <td height="50" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:justify"><p><font size="2" face="Verdana">Declaramos para os devidos
                    fins que <strong><?php echo strtoupper($_SESSION['nome'])?></strong> <?php echo $frase1; ?>
                    curso de P&oacute;s Gradua&ccedil;&atilde;o em &quot;<strong><?php echo strtoupper($_SESSION['nomeCurso']); ?></strong>&quot;,
                    ministrado por este IPECON - Instituto de Organiza&ccedil;&atilde;o de Eventos,
                    Ensino e Consultoria S/S Ltda, em parceria com a Pontifícia Universidade Católica de Goiás - PUC GO.</font>
                    </p>
                    <p>
                    <font size="2" face="Verdana">Informamos ainda que o curso <?php echo $frase2; ?> de <?php echo $reg_consulta['Data_Inicial'] .' a '. $reg_consulta['Data_Final']; ?>.</font>
                    </p>
                </td>
            </tr>
            <tr align="center" valign="bottom">
                <td height="100" colspan="2"><img src="../imagens/assinatura_digital.jpg" width="185" height="82"></td>
            </tr>  <tr align="right">
                <td colspan="2"><font size="2" face="Verdana">Goi&acirc;nia,<?php echo date('d/m/Y'); ?>.</font></td>
            </tr>
        </table>
    </body>
</html>
