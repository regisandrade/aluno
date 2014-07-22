<?php
$sql = "
SELECT
	ALU.Id_Numero,
	ALU.Nome AS Aluno,
	CUR.Codg_Curso,
	CUR.Nome AS Curso
FROM
	aluno ALU
INNER JOIN curso CUR ON
	CUR.Codg_Curso = ALU.Curso
WHERE
	ALU.Id_Numero = '".$_SESSION['id_numero']."' AND ALU.Ano = ".$_SESSION['ano'];
$result = mysql_query($sql) or die('Erro na consulta da Tabela de Usuario. '.mysql_error().'<br>'.$sql);
$dados = mysql_fetch_array($result);


// Verificar se jï¿½ existe um depoimento digitado
$depoimento = "SELECT * FROM depoimento WHERE Aluno = '".$_SESSION['id_numero']."' AND Codg_Curso = ".$_SESSION['curso'];
$res_depoimento = mysql_query($depoimento) or die('Erro na consulta da Tabela de Depoimento. '.mysql_error().'<br>'.$depoimento);
$numero = mysql_num_rows($res_depoimento);

if($numero > 0){
?>
	<script>
		alert('Você já fez o seu Depoimento para este Curso.');
		document.location = "home.php";
	</script>
<?php
	exit;
}
?>
<h2>Depoimento</h2>
   <table align="center" border="0" cellpadding="0" cellspacing="2">
    <form name="form_depoimento" method="post" action="depoimento/gravar.php" onSubmit="return Verificar()">
		<input type="hidden" name="aluno" value="<?php print($dados['Id_Numero']); ?>">
		<input type="hidden" name="curso" value="<?php print($dados['Codg_Curso']); ?>">
		<input type="hidden" name="data" value="<?php print(date('Y-m-d')); ?>">
		<input type="hidden" name="status" value="0">
          <tr>
            <td width="20%" height="22" align="right" class="textoInscricao12Negrito">Aluno:</td>
            <td width="78%"><?php print($dados['Aluno']); ?></td>
          </tr>
          <tr>
            <td height="22" align="right" class="textoInscricao12Negrito">Curso:</td>
            <td><?php print($dados['Curso']); ?></td>
          </tr>
          <tr>
            <td height="22" align="right" valign="top" class="textoInscricao12Negrito">Depoimento:</td>
            <td><textarea name="depoimento" cols="50" rows="12" class="txtInscricaoGrande" id="depoimento"></textarea></td>
          </tr>
          <tr> 
            <td height="35">&nbsp;</td>
            <td><input name="gravar" type="submit" id="gravar" value="Gravar" class="botao">&nbsp;&nbsp;<input type="button" name="voltar" value="Cancelar" class="botao" onClick="history.back()"></td>
          </tr>
          <script language="JavaScript">document.form_depoimento.depoimento.focus();</script>
    </form>
    </table>
    <p>&nbsp;</p>
