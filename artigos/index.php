<?php
/**
*
*  CONSULTA DE ARTIGOS
*  @autor Regis Andrade
*
*/

require_once "class/artigo.class.php";
$artigoDAO = new Artigo();
$listaArtigos = $artigoDAO->pesquisar($bd);

?>
<h2>Artigos</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Descrição</th>
      <th>Data</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaArtigos)){ ?>
    <tr>
      <td colspan="2"><p class="text-error">Nenhum registro encontrado.</p></td>
    </tr>
    <?php }else{ 
      foreach ($listaArtigos as $value) {
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