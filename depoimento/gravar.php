<?php
require('../../conexao.php'); //== Faz a conexão com o banco

$gravar = "
INSERT INTO depoimento (
	Aluno,
	Codg_Curso,
	Depoimento,
	Data,
	Status
)VALUES(
	'".$_POST['aluno']."',
	".$_POST['curso'].",
	'".$_POST['depoimento']."',
	'".$_POST['data']."',
	".$_POST['status'].")";
mysql_query($gravar) or die('Erro na gravação do Depoimento. '.mysql_error());
?>
<script>
	alert('Seu Depoimento foi enviado com sucesso.');
	document.location = "../home.php";
</script>