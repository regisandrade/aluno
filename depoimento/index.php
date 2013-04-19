<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/

require_once "class/depoimento.class.php";
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

<form class="form-horizontal" name="form_depoimento" method="post" action="depoimento/gravar.php">
  <input type="hidden" name="aluno" value="<?php echo $_SESSION['idNumero']; ?>">
  <input type="hidden" name="curso" value="<?php echo $_SESSION['idCurso']; ?>">
  <input type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>">
  <input type="hidden" name="status" value="0">

  <div class="control-group">
    <label class="control-label">Aluno:&nbsp;</label>
    <div class="controls">
      <?php echo $_SESSION['nomeALuno']; ?>
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
      <textarea name="depoimento" id="depoimento" placeholder="Depoimento"></textarea></textarea>
      <br/>
      <br/>
      <button class="btn btn-large btn-primary <?php echo $desabilitarBotao ?>" type="submit">Gravar Depoimento</button>
    </div>
  </div>
  
</form>