<?php
// Criando uma conexão com o bd Banco de oportunidade
require_once "../../lib/myDB.class.php";
$param['sistema'] = 'bcoOportunidade';
$pdoBco = new myDB($param);
$bdBcoOportunidade = $pdoBco->getInstance($param);
unset($param);


$vagaDAO = new Vaga();
$param['idNumero'] = $_SESSION['idNumero'];
$param['dataHoje'] = date('Y-m-d H:i:s');
$param['order'] = "VAG.DATA_INICIO_VIGENCIA";
$rsVagas = $vagaDAO->pesquisar($bdBcoOportunidade,$param);
unset($param);
?>
<h2>Vagas anunciadas</h2>
<?php
  foreach ($rsVagas as $chave => $valor) {
?>
<div class="alert alert-info">
  <h3><?php echo $valor['CARGO'] ?></h3>
  <p>
    <?php echo $valor['DESCRICAO']; ?><br>
    <span class="label">Carga horária:&nbsp;</span><?php echo $valor['CARGA_HORARIA']; ?><br>
    <span class="label">Atividades:&nbsp;</span><?php echo nl2br($valor['ATIVIDADES']); ?><br>
    <span class="label">Perfil desejado:&nbsp;</span><?php echo nl2br($valor['PERFIL_DESEJADO']); ?><br>
    <?php
    if($valor['SALARIO'] && $valor['SALARIO'] > 0){
    ?>
      <span class="label">Salário:&nbsp;</span>R$&nbsp;<?php echo number_format($valor['SALARIO'],2,',','.'); ?><br>
    <?php
    }
    ?>
  </p>
  <p>
    <a class="btn btn-info btn-large" name="btnEnviarCurriculo" id="btnEnviarCurriculo" onClick="candidatarVaga('<?php echo $_SESSION['idNumero']; ?>',<?php echo $valor['ID']; ?>)">
      Candidatar a esta vaga
    </a>
  </p>
</div>
<br />
<br />
<?php
  }
?>