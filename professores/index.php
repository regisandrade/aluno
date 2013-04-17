<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/
require_once "class/professores.class.php";
$professoresDAO = new Professores();
$listaProfessores = $professoresDAO->pesquisar($bd);
?>
<h2>Professores</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Descrição</th>
      <th>Data</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaProfessores)){ ?>
    <tr>
      <td colspan="2"><p class="text-error">Nenhum registro encontrado.</p></td>
    </tr>
    <?php }else{ 
      foreach ($listaProfessores as $value) {
    ?>
    <tr>
      <td><a href="../artigos/<?php echo $value['Artigo']; ?>" target="_blank"><?php echo $value['Descricao']; ?></a></td>
      <td><?php echo $value['Data']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>