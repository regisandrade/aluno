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
        $resposta = array("sucesso"=>true,
                          "mensagem"=>utf8_encode($value['Descricao']));
        $param    = array("titulo"=>utf8_encode($value['Titulo']),
                          "largura"=>318,
                          "altura"=>250);
    ?>
    <tr>
      <td><a href="#" onClick="alertaDialog(<?php echo $resposta ?>,<?php echo $param ?>)"><?php echo utf8_encode($value['Titulo']); ?></a></td>
      <td><?php echo $value['Data']; ?></td>
    </tr>
    <?php }
    } 
    ?>
  </tbody>
</table>