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
      <td><a href="#" onClick="Abrir_Aviso(<?php echo $value['Codg_Aviso'] ?>,318,250)"><?php echo utf8_encode($value['Titulo']); ?></a></td>
      <td><?php echo $value['Data']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>