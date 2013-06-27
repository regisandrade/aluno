<?php
$curriculoDAO = new Curriculo();

switch ($_REQUEST['ACAO']) {
	
	case 'ALTERAR':
		$parametros['novaSenha'] = $_REQUEST['aluno'];
		$parametros['login']     = $_REQUEST['curso'];
		$curriculoDAO->alterar($bd,$parametros);
		unset($parametros);
		break;
	
	case 'INCLUIR':
		$parametros['novaSenha'] = $_REQUEST['aluno'];
		$parametros['login']     = $_REQUEST['curso'];
		$curriculoDAO->inserir($bd,$parametros);
		unset($parametros);
		break;
	
}
?>