<?php
require_once "../lib/myDB.class.php";

$param['sistema'] = 'ipecon';
$bd = myDB::getInstance($param);
unset($param);

require_once "../class/Senha.class.php";
$senhaDAO = new Senha();

switch ($_REQUEST['ACAO']) {
	case 'ALTERAR_SENHA':
		$parametros['senha_antiga']  = $_REQUEST['senha_antiga'];
		$parametros['novaSenha']     = $_REQUEST['nova_senha'];
		$parametros['repetir_senha'] = $_REQUEST['repetir_senha'];
		$parametros['idNumero']      = $_REQUEST['idNumero'];
		$senhaDAO->alterar($bd,$parametros);
		unset($parametros);
		break;
	
}
?>