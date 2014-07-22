<?php
/**
*
*  CONSULTA DE LINKS
*  @autor Regis Andrade
*
*/

$linksDAO = new Links();
$parametros['order'] = "Tipo";
$listaLinks = $linksDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Links</h2>
<table class="table table-striped table-bordered table-hover">

  <tbody>
    <?php if(!is_array($listaLinks)){ ?>
    <tr>
      <td colspan="2" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      $tipo = null;
      foreach ($listaLinks as $value) {
        if($tipo != $value['Tipo']){
           switch($value['Tipo']){
              case 1:
                $nomeTipo = "Universidade";
                break;
              case 2:
                $nomeTipo = "Bibliotecas";
                break;
              case 3:
                $nomeTipo = "Conselho";
                break;
              case 4:
                $nomeTipo = "Outros";
                break;
           }
    ?>
    <tr>
      <td colspan="2"><strong><?php echo $nomeTipo; ?></strong></td>
    </tr>
    <?php
           $tipo = $value['Tipo'];
        }
    ?>
    <tr>
      <td colspan="2"><a href="http://www.<?php echo $value['Link']; ?>/" target="_blank"><?php echo utf8_encode($value['Descricao']); ?></a></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>
