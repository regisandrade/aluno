<?php
// Criando uma conexão com o bd Banco de oportunidade
require_once "../../lib/myDB.class.php";
$param['sistema'] = 'bcoOportunidade';
$pdoBco = new myDB($param);
$bdBcoOportunidade = $pdoBco->getInstance($param);
unset($param);


$vagaDAO = new Vaga();
$param['idNumero'] = $_SESSION['idNumero'];
$vagaDAO->pesquisar($bdBcoOportunidade,$param);
unset($param);
?>