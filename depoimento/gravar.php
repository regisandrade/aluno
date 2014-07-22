<?php
require_once "../../lib/myDB.class.php";
$bd = new myDB();

require_once "../class/depoimento.class.php";
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