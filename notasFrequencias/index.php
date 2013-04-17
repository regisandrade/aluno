<?php
/**
*
*  CONSULTA DE NOTAS/FREQUENCIAS
*  @autor Regis Andrade
*
*/

require_once "class/notasFrequencias.class.php";
$notasFrequenciasDAO = new NotasFrequencias();
$listaNotasFrequencias = $notasFrequenciasDAO->pesquisar($bd);
?>
<h2>Notas/Frequências</h2>
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
    <?php if(!is_array($listaNotasFrequencias)){ ?>
    <tr>
      <td colspan="7"><p class="text-error">Nenhum registro encontrado.</p></td>
    </tr>
    <?php }else{ 
      foreach ($listaNotasFrequencias as $value) {
    ?>
    <tr>
      <td><?php echo ($conta + 1); ?>.&nbsp;<?php echo $value['Disciplina']; ?></td>
      <td><?php echo $value['Data_1']; ?></td>
      <td><?php echo $value['Data_2']; ?></td>
      <td><?php echo $value['Data_3']; ?></td>
      <td><?php echo $value['Data_4']; ?></td>
      <td><?php echo $value['Data_5']; ?></td>
      <td><?php echo $value['Data_6']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>