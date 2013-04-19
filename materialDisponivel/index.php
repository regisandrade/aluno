<?php
/**
*
*  CONSULTA DE MATERIAIS DISPONIVEIS
*  @autor Regis Andrade
*
*/

require_once "class/materiais.class.php";
$materiaisDAO = new Materiais();
$parametros['turma'] = $_SESSION['turma'];
$listaMateriais = $materiaisDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Material Disponível</h2>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Material</th>
    </tr>
  </thead>

  <tbody>
    <?php if(!is_array($listaMateriais)){ ?>
    <tr>
      <td colspan="2" class="error">Nenhum registro encontrado.</td>
    </tr>
    <?php }else{ 
      foreach ($listaMateriais as $value) {
        switch($value['tipoMaterial']){
          case 1:
            $nomeTipo = 'Exercícios';
            break;
          case 2:
            $nomeTipo = 'Material Didático';
            break;
          case 3:
            $nomeTipo = 'Material de Apoio';
            break;
          case 4:
            $nomeTipo = 'Trabalhos';
            break;
          case 5:
            $nomeTipo = 'Apostilas';
            break;
        }
    ?>
    <tr>
      <td><?php echo $nomeTipo; ?></td>
      <td><a href="../exercicios/<?php echo $value['exercicio']; ?>" target="_blank" title="Data: <?php echo $value['data']; ?>"><?php echo $value['exercicio']; ?></a></td>
    <?php }
    } 
    ?>
  </tbody>
</table>