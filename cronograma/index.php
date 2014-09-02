<?php
/**
*
*  CONSULTA DE CRONOGRAMAS
*  @autor Regis Andrade
*
*/

$cronogramaDAO = new Cronograma();
$parametros['turma'] = $_SESSION['turma'];
$listaCronogramas = $cronogramaDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Cronograma</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Disciplina</th>
      <th>1ª Data</th>
      <th>2ª Data</th>
      <th>3ª Data</th>
      <th>4ª Data</th>
      <th>5ª Data</th>
      <th>6ª Data</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaCronogramas)){ ?>
    <tr>
      <td colspan="7" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      $conta = 0;
      foreach ($listaCronogramas as $value) {
    ?>
    <tr>
      <td><?php echo ($conta + 1); ?>.&nbsp;<?php echo utf8_encode($value['Disciplina']); ?></td>
      <td><?php echo $value['Data_1']; ?></td>
      <td><?php echo $value['Data_2']; ?></td>
      <td><?php echo $value['Data_3']; ?></td>
      <td><?php echo $value['Data_4']; ?></td>
      <td><?php echo $value['Data_5']; ?></td>
      <td><?php echo $value['Data_6']; ?></td>
    </tr>
    <?php 
         $conta++;
      }
    } 
    ?>
  </tbody>
</table>