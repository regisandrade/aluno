<?php
// Consultar o nome e e-mail do aluno para colocar no formulï¿½rio
$cmd_aluno = "SELECT Nome, e_Mail FROM aluno WHERE Id_Numero = '".$_SESSION['id_numero']."'";
$res_aluno = mysql_query($cmd_aluno) or die('Erro na consulta do Nome e e-Mail do Aluno. '.mysql_error());
$reg_aluno = mysql_fetch_array($res_aluno);
?>
<h2>Ajuda</h2>
   <table align="center" border="0" cellpadding="0" cellspacing="2">
      <form name="form_ajuda" method="get" action="ajuda/mail.php" onSubmit="return VerificarAjuda()">
        <tr>
          <td width="22%" height="22" align="right" class="textoInscricao12Negrito">Nome:</td>
          <td width="78%"><input name="nome" type="text" class="txtInscricaoMedio" id="nome" value="<?php print($reg_aluno['Nome']); ?>" size="35" readonly="true"></td>
        </tr>
        <tr>
          <td height="22" align="right" class="textoInscricao12Negrito">e-Mail:</td>
          <td><input name="email" type="text" class="txtInscricaoMedio" id="email" value="<?php print($reg_aluno['e_Mail']); ?>" size="35" readonly="true"></td>
        </tr>
        <tr>
          <td height="22" align="right" class="textoInscricao12Negrito">Para:</td>
          <td><select name="para" class="txtInscricaoMedio">
		  	<option value="ipecon@ipecon.com.br">IPECON</option>
			<option value="regisandrade@gmail.com">Regis Andrade (Suporte)</option>
		  </select></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="top" class="textoInscricao12Negrito">Mensagem:</td>
          <td><textarea name="mensagem" cols="45" rows="5" class="txtInscricaoMedio"></textarea></td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td><input name="enviar" type="submit" id="enviar" value="Enviar Dúvida" class="botao">&nbsp;&nbsp;<input type="button" name="voltar" value="Cancelar" onClick="history.back()" class="botao"></td>
        </tr>
        <?php
		  if(!isset($msg)){
		    echo '';
		  }else{
		  ?>
        <tr>
          <td height="22">&nbsp;</td>
          <td><font color="#FF0000"><?php print($msg); ?></font></td>
        </tr>
        <?php
		  }
		  ?>
        <script language="JavaScript">document.form_ajuda.para.focus()</script>
      </form>
    </table>
   <p>&nbsp;</p>
