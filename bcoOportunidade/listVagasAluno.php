<?php
$vagaDAO = new Vaga();
//$param['dataHoje'] = date('Y-m-d H:i:s');
$param['order']    = "DATA_INICIO_VIGENCIA";
$rsVagas = $vagaDAO->pesquisar($pdo,$param);
unset($param);

?>
<h2>Vagas disponíveis</h2>
<?php
  foreach ($rsVagas as $chave => $valor) {
?>
<div class="alert alert-info">
  <h3><?php echo utf8_encode($valor['cargo']) ?></h3>
  <p>
    <?php echo utf8_encode($valor['descricao']); ?><br>
    <dl class="dl-horizontal">
      <dt>Carga horária:</dt><dd><?php echo $valor['cargaHoraria']; ?></dd>
      <dt>Atividades:</dt><dd><?php echo nl2br(utf8_encode($valor['atividades'])); ?></dd>
      <dt>Perfil desejado:</dt><dd><?php echo nl2br(utf8_encode($valor['perfilDesejado'])); ?></dd>
    <?php
    if($valor['beneficios']){
    ?>
      <dt>Benefícios:</dt><dd><?php echo nl2br(utf8_encode($valor['beneficios'])); ?></dd>
    <?php
    }

    if($valor['salario'] && $valor['salario'] > 0){
    ?>
      <dt class="text-warning">Salário:</dt><dd class="text-warning">R$&nbsp;<?php echo number_format($valor['salario'],2,',','.'); ?></dd><br>
    <?php
    }
    ?>
    </dl>
  </p>
  <p>
    <a class="btn btn-danger btn-large" name="btnEnviarCurriculo" id="btnEnviarCurriculo" onClick="candidatarVaga('<?php echo $_SESSION['idNumero']; ?>',<?php echo $valor['id']; ?>)">
      Candidatar a esta vaga
    </a>
  </p>
</div>
<br />
<br />
<?php
  }
?>