<h2>Alterar senha</h2>
<p>
	<form class="form-horizontal" method="post" action="alterarSenha/alterar.php">
		<input name="login" type="hidden" value="<?php echo $_SESSION['login']; ?>">

		<div class="control-group">
			<label class="control-label" for="nome">Senha antiga:</label>
			<div class="controls">
				<input name="senha_antiga" type="password" id="senha_antiga" class="input-medium" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="nome">Nova senha:</label>
			<div class="controls">
				<input name="nova_senha" type="password" id="nova_senha" class="input-medium" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="nome">Repetir senha:</label>
			<div class="controls">
				<input name="repetir_senha" type="password" id="repetir_senha" class="input-medium" required>
				<br/>
        		<br/>
        		<button class="btn btn-large btn-primary" type="submit">Alterar Senha</button>
			</div>
		</div>
  
  </form>

</p>