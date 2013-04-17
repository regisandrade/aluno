<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/

require_once "../../lib/myDB.class.php";
$bd = new myDB();

require_once "../class/depoimento.class.php";
$depoimentoDAO = new Depoimento();
$parametros['idNumero'] = $_SESSION['id_numero'];
$parametros['idCurso']  = $_SESSION['curso'];
$verificarDepoimento = $depoimentoDAO->verificarDepoimento($bd,$parametros);
unset($parametros);

$desabilitarBotao = null;
if($verificarDepoimento['sucesso']){
  $desabilitarBotao = ' disabled="true"';
?>
  <script>
    alert("<?php echo $verificarDepoimento['mensagem']; ?>");
  </script>
<?php
  exit;
}
?>
<h2>Depoimento</h2>

<form name="form_depoimento" method="post" action="depoimento/gravar.php" onSubmit="return Verificar()">
  <input type="hidden" name="aluno" value="<?php echo $_SESSION['id_numero']; ?>">
  <input type="hidden" name="curso" value="<?php echo $_SESSION['curso']; ?>">
  <input type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>">
  <input type="hidden" name="status" value="0">

  <label>Aluno:</label><?php echo $_SESSION['nomeALuno']; ?>

  <label>Curso:</label><?php echo $_SESSION['nomeCurso']; ?>

  <label>Depoimento:</label><textarea name="depoimento" id="depoimento"></textarea>
 
  <button class="btn btn-large btn-primary" type="submit" <?php echo $desabilitarBotao ?> >Gravar Depoimento</button>
</form>