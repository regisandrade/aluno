<?php
require_once "../lib/myDB.class.php";

$param['sistema'] = 'ipecon';
$bd = myDB::getInstance($param);
unset($param);

require_once "../class/Depoimento.class.php";
$depoimentoDAO = new Depoimento();

switch ($_REQUEST['ACAO']) {
	case 'GRAVAR':
        $parametros['idNumero'] = $_REQUEST['aluno'];
        $parametros['codgCurso'] = $_REQUEST['curso'];
        $parametros['depoimento'] = utf8_decode($_REQUEST['depoimento']);
        $depoimentoDAO->incluir($bd,$parametros);
        unset($parametros);
        break;
	
}
?>