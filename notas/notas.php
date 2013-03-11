<?php
session_start();
require('../../conexao.php');
?>
<html>
<head>
<title>IPECON - Ensino e Consultoria</title>
<link href="../../area_aluno.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
function Verificar(){
	if(document.form_notas.codg_disciplina.value=='??'){
		alert('Favor, selecionar a Disciplina.');
		document.form_notas.codg_disciplina.focus();
		return false;
	}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-image: url(../imagens/fundo.gif);
}
-->
</style></head>
<body bgcolor="#ffffff" topmargin="0" leftmargin="0">
<?php include('../sub_topo.php'); ?>
<table width="760" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td valign="top">
		<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="93%" height="45" valign="middle"><span class="Caption"><img src="../imagens/gif_006.gif" width="30" height="31" align="texttop"> Consulta de Notas/Frequ&ecirc;ncias</span></td>
            <td width="7%" align="center" valign="middle"><a href="JavaScript:history.back()"><img src="../imagens/gif_013.gif" border="0"><br>
      Voltar</a></td>
          </tr>
        </table>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
	    <form name="form_notas" method="get" action="resultado.php" onSubmit="return Verificar()">
		<input type="hidden" name="id_numero" value="<?php print($id_numero); ?>">
		  <tr> 
			<td height="7" colspan="2" background="../../imagens/spacer.gif"></td>
		  </tr>
          <tr> 
            <td width="20%" height="22" align="right" class="Texto" style="padding-left: 0.3em">Disciplina:</td>
            <td width="78%" style="padding-left: 0.3em"><select name="codg_disciplina" class="TextoFormulario">
			<option value="0">[-- Selecionar Disciplina --]</option>
			<?
				$qry_disciplina = "SELECT Codg_disciplina,Nome FROM disciplina WHERE Codg_Curso = ".$_SESSION['curso']." ORDER BY Nome";
				$res_disciplina = mysql_query($qry_disciplina);
				while(list($codg_disciplina,$nome_disciplina) = mysql_fetch_row($res_disciplina)){
			?>
			<option value="<?php print($codg_disciplina); ?>"><?php print($nome_disciplina); ?></option>
			<?
				}
			?>
			</select>
			</td>
          </tr>
          <tr> 
            <td height="35" class="Texto" style="padding-left: 0.3em">&nbsp;</td>
            <td style="padding-left: 0.3em"><input name="selecionar" type="submit" id="selecionar" value="Selecionar">&nbsp;&nbsp;<input type="button" name="voltar" value="Cancelar" onClick="history.back()"></td>
          </tr>
          <script language="JavaScript">document.form_notas.codg_disciplina.focus()</script>
        </form>
    </table>
	</td>
  </tr>
  <tr bgcolor="#F5F5F5">
    <td height="10" colspan="2" class="Texto_Normal">D&uacute;vidas: <a href="mailto:regisandrade@realizanet.com.br">Regis Andrade :: WebMaster</a></td>
  </tr>
</table>
</body>
</html>