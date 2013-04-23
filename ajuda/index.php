<h2>Ajuda</h2> <p>
  <form name="formAjuda" class="form-horizontal" method="POST" action="ajuda/enviar.php">
    
    <div class="control-group">
      <label class="control-label" for="nome">Nome:</label>
      <div class="controls">
        <input type="text" name="nome" id="nome" class="input-large" required>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="email">e-Mail:</label>
      <div class="controls">
        <input type="email" name="email" id="email" class="input-large" required>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="para">Para:</label>
      <div class="controls">
        <select name="para" id="para" class="input-large" required>
          <option value="ipecon@ipecon.com.br" selected="true">IPECON</option>
          <option value="regisandrade@gmail.com">Regis Andrade (Suporte)</option>
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="mensagem">Mensagem:</label>
      <div class="controls">
        <textarea name="mensagem" id="mensagem" class="input-large" rows="7" required></textarea>
        <br/>
        <br/>
        <button class="btn btn-large btn-primary" type="submit">Enviar mensagem</button>
      </div>
    </div>

  </form>
</p>