<?php
require_once "../lib/myDB.class.php";
$bd = new myDB();

require_once "class/senha.class.php";
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