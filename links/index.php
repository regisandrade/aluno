<?php
/**
*
*  CONSULTA DE LINKS
*  @autor Regis Andrade
*
*/

require_once "../../lib/myDB.class.php";
$bd = new myDB();

require_once "../class/links.class.php";
$linksDAO = new Links();
$listaLinks = $linksDAO->pesquisar($bd);
?>
<h2>Links</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Descrição</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaLinks)){ ?>
    <tr>
      <td colspan="2"><p class="text-error">Nenhum registro encontrado.</p></td>
    </tr>
    <?php }else{ 
      foreach ($listaLinks as $value) {
    ?>
    <tr>
      <td><?php echo $value['Tipo']; ?></td>
      <td><a href="http://www.<?php echo $value['Link']; ?>/" target="_blank"><?php echo $value['Descricao']; ?></a></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>