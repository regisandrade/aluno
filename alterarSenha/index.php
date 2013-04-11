<h2>Alterar senha</h2>

<form name="form_senha" method="post" action="senha/senha_alterada.php" onSubmit="return VerificarFormSenha()">
  <input name="login" type="hidden" value="<?php print($_SESSION['login']); ?>">

  <label>Senha antiga:</label><input name="senha_antiga" type="password" class="txtInscricaoPequeno" id="senha_antiga" size="15" maxlength="15">

  <label>Nova senha:</label><input name="nova_senha" type="password" class="txtInscricaoPequeno" id="nova_senha" size="15" maxlength="15">

  <label>Repetir senha:</label><input name="repetir_senha" type="password" class="txtInscricaoPequeno" id="repetir_senha" size="15" maxlength="15">

  <button class="btn btn-large btn-primary" type="submit">Alterar Senha</button>

</form>