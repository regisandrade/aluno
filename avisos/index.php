<?php
/**
*
*  CONSULTA DE AVISOS
*  @autor Regis Andrade
*
*/

require_once "class/aviso.class.php";
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
      <td colspan="2"><p class="text-error">Nenhum registro encontrado.</p></td>
    </tr>
    <?php }else{ 
      foreach ($listaAvisos as $value) {
    ?>
    <tr>
      <td><a href="#" onClick="Abrir_Aviso(<?php echo $value['Codg_Aviso'] ?>,318,250)"><?php echo $value['Titulo']; ?></a></td>
      <td><?php echo $value['Data']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>