<h2>Alterar minha senha</h2>
   <table border="0" cellpadding="0" cellspacing="2">
      <form name="form_senha" method="post" action="senha/senha_alterada.php" onSubmit="return VerificarFormSenha()">
	  <input name="login" type="hidden" value="<?php print($_SESSION['login']); ?>">
        <?php
		  if(!isset($_REQUEST['msg'])){
		    echo '';
		  }else{
		  ?>
        <tr>
          <td width="22%" height="22">&nbsp;</td>
          <td width="78%"><font color="#FF0000"><?=$_REQUEST['msg']; ?></font></td>
        </tr>
        <?php
		  }
		  ?>
        <tr>
          <td height="22" align="right" class="textoInscricao12Negrito">Senha antiga:</td>
          <td><input name="senha_antiga" type="password" class="txtInscricaoPequeno" id="senha_antiga" size="15" maxlength="15"></td>
        </tr>
        <tr>
          <td height="22" align="right" class="textoInscricao12Negrito">Nova senha:</td>
          <td><input name="nova_senha" type="password" class="txtInscricaoPequeno" id="nova_senha" size="15" maxlength="15">
              <font color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td height="22" align="right" class="textoInscricao12Negrito">Repetir senha:</td>
          <td><input name="repetir_senha" type="password" class="txtInscricaoPequeno" id="repetir_senha" size="15" maxlength="15">
              <font color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td><input name="alterar" type="submit" id="alterar" value="Alterar" class="botao">&nbsp;&nbsp;<input type="button" name="voltar" value="Cancelar" onClick="history.back()" class="botao"></td>
        </tr>
        <tr>
          <td height="22">&nbsp;</td>
          <td valign="middle"><font color="#FF0000">* Nova senha no m&aacute;ximo 15 letras e/ou n&uacute;mero;</font></td>
        </tr>
      </form>
    </table>
    <p>&nbsp;</p>
