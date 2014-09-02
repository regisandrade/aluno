<?php
require_once "../lib/myDB.class.php";

$param['sistema'] = 'ipecon';
$bd = myDB::getInstance($param);
unset($param);

require_once "../class/Senha.class.php";
$senhaDAO = new Senha();

switch ($_REQUEST['ACAO']) {
	case 'ALTERAR_SENHA':
		$parametros['novaSenha'] = $_REQUEST['aluno'];
		$parametros['login']     = $_REQUEST['curso'];
		$senhaDAO->alterar($db,$parametros);
		unset($parametros);
		break;
	
}
?>