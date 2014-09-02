<?php
/**
*
*  CONSULTA DE AVISOS
*  @autor Regis Andrade
*
*/

$avisoDAO = new Aviso();
$listaAvisos = $avisoDAO->pesquisar($bd);
?>
<h2>Avisos</h2>
<?php
if (is_array($listaAvisos)) {
  foreach ($listaAvisos as $value) {
    echo "<div class=\"alert alert-block ver-aviso\" id=\"aviso".$value['CodigoAviso']."\">\n";
    echo "\t<a class=\"close\" data-hide=\"alert\">×</a>\n";
    echo "\t<strong>".utf8_encode($value['Titulo'])."</strong><br>";
    echo nl2br($value['Descricao']);
    echo "</div>";
    echo "<br>";
  }
}
?>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Título</th>
      <th>Data</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaAvisos)){ ?>
    <tr>
      <td colspan="2" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      foreach ($listaAvisos as $value) {
    ?>
    <tr>
      <td><a href="#" onClick="verAviso(<?php echo $value['CodigoAviso'] ?>)"><?php echo utf8_encode($value['Titulo']); ?></a></td>
      <td><?php echo $value['Data']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>