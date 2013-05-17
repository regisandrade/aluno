<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/

$depoimentoDAO = new Depoimento();
$parametros['idNumero'] = $_SESSION['idNumero'];
$parametros['idCurso']  = $_SESSION['idCurso'];
$verificarDepoimento = $depoimentoDAO->verificarDepoimento($bd,$parametros);
unset($parametros);

$desabilitarBotao = null;
if($verificarDepoimento['sucesso']){
  $desabilitarBotao = ' disabled';
?>
  <script>
    alert("<?php echo $verificarDepoimento['mensagem']; ?>");
  </script>
<?php
  exit;
}
?>
<h2>Depoimento</h2>
<p>
    <form class="form-horizontal" name="formDepoimento" method="POST" action="depoimento/gravar.php">
      <input type="hidden" name="aluno" value="<?php echo $_SESSION['idNumero']; ?>"/>
      <input type="hidden" name="curso" value="<?php echo $_SESSION['idCurso']; ?>"/>
      <input type="hidden" name="ACAO" value="GRAVAR"/>

      <div class="control-group">
        <label class="control-label">Aluno:&nbsp;</label>
        <div class="controls">
          <?php echo $_SESSION['nomeAluno']; ?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">Curso:&nbsp;</label>
        <div class="controls">
          <?php echo $_SESSION['nomeCurso']; ?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="mensagem">Depoimento:&nbsp;</label>
        <div class="controls">
          <textarea name="depoimento" id="depoimento" placeholder="Escrever depoimento" rows="5"></textarea>
          <br/>
          <br/>
          <button id="gravarDepoimento" class="btn btn-large btn-primary <?php echo $desabilitarBotao ?>" type="button">Gravar Depoimento</button>
        </div>
      </div>
    </form>
</p>