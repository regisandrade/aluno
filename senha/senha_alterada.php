<?php
session_start();
//=============================================//
// Proprietário : IPECON - Ensino e Consultoria
// Site : www.ipecon.com.br
// Autor : Régis Rodrigues de Andrade
// Página : Alterar Senha
//=============================================//

require('../../conexao.inc.php'); //== Faz a conexão com o banco

// Verificar se o usuario esta cadastrado
$cmd_usuario = "SELECT * FROM usuario_aluno WHERE Login = '".$_REQUEST['login']."'";
$res_usuario = mysql_query($cmd_usuario) or die ("Erro na Consulta do Aluno. ".mysql_error());
$num = mysql_num_rows($res_usuario);

if($num < 1){
	$mensagem = "Login não cadastrado.";
	header("location: alterar_senha.php?msg=$mensagem");
	exit;
}

// Alterar a Senha
$cmd_alterar = "
UPDATE usuario_aluno SET
	Senha = '".$_REQUEST['nova_senha']."'
WHERE
	Login = '".$_REQUEST['login']."'";

mysql_query($cmd_alterar) or die ("Erro na Alteração do Aluno.");

// Verificar se o usuario
$cmd_psw = "SELECT * FROM usuario_aluno WHERE Login = '".$_REQUEST['login']."'";
$res_psw = mysql_query($cmd_psw) or die ("Erro na Consulta do Aluno para mudar a senha. ");
$reg_psw = mysql_fetch_array($res_psw);

// criar a sessão com a nova senha
$_SESSION['psw'] = $reg_psw['Senha'];
?>
<script>
   alert("Senha Alterada com sucesso.");
   document.location = "../home.php?pagina=10";
</script>
