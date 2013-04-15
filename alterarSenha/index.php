<h2>Alterar senha</h2>

<form name="form_senha" method="post" action="senha/senha_alterada.php">
  <input name="login" type="hidden" value="<?php echo $_SESSION['login']; ?>">

  <label>Senha antiga:</label><input name="senha_antiga" type="password" id="senha_antiga">

  <label>Nova senha:</label><input name="nova_senha" type="password" id="nova_senha">

  <label>Repetir senha:</label><input name="repetir_senha" type="password" id="repetir_senha">

  <button class="btn btn-large btn-primary" type="submit">Alterar Senha</button>

</form>