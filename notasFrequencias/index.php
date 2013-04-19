<?php
/**
*
*  CONSULTA DE NOTAS/FREQUENCIAS
*  @autor Regis Andrade
*
*/

require_once "class/notasFrequencias.class.php";
$notasFrequenciasDAO = new NotasFrequencias();

$parametros['ano']      = $_SESSION['ano'];
$parametros['turma']    = $_SESSION['turma'];
$parametros['idNumero'] = $_SESSION['idNumero'];
$listaNotasFrequencias = $notasFrequenciasDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Notas/Frequências</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Disciplina</th>
      <th>Nota</th>
      <th>Frequência</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaNotasFrequencias)){ ?>
    <tr>
      <td colspan="3" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      $conta = 1;
      foreach ($listaNotasFrequencias as $value) {
    ?>
    <tr>
      <td><?php echo $conta.' - '.$value['disciplina']; ?></td>
      <td><?php echo $value['nota']; ?></td>
      <td><?php echo $value['frequencia']; ?></td>
    </tr>
    <?php
        $conta++;
      }
    } 
    ?>
  </tbody>
</table>