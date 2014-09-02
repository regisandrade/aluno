<?php
$curriculoDAO = new Curriculo();

switch ($_REQUEST['ACAO']) {
   case 'ALTERAR':
      $curriculoDAO->alterar($bd,$_REQUEST);
      break;
   case 'INCLUIR':
      echo "<pre>";
      print_r($bd);
      print_r($_REQUEST);
      echo "</pre>";
      $curriculoDAO->inserir($bd,$_REQUEST);
      break;
}
?>