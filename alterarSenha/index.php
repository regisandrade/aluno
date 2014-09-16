<h2>Alterar senha</h2>
<p>
	<form name="formAlterarSenha" class="form-horizontal" method="post" action="alterarSenha/gravar.php">
		<input name="ACAO" type="hidden" value="ALTERAR_SENHA">
		<input name="idNumero" type="hidden" value="<?php echo $_SESSION['idNumero']; ?>">		

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
        		<button id="alterarSenhaAluno" class="btn btn-large btn-primary" type="button">Alterar Senha</button>
			</div>
		</div>
  
  </form>

</p>