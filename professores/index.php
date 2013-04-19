<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/
require_once "class/professores.class.php";
$professoresDAO = new Professores();

$parametros['turma'] = $_SESSION['turma'];
$parametros['ano']   = $_SESSION['ano'];
$listaProfessores = $professoresDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Professores</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Currículo Lates</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaProfessores)){ ?>
    <tr>
      <td colspan="2" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      foreach ($listaProfessores as $value) {
    ?>
    <tr>
      <td><?php echo $value['professor']; ?></td>
      <td><?php echo $value['url'] != '--' ? "<a href='http://".$value['url']."' target='_blank'>Lates</a>" : ''; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>