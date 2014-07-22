<?php
require('../conexao.inc.php');

$comando = "
	SELECT
		Titulo,
		Descricao,
		DATE_FORMAT(Data_Cadastro,'%d/%m/%Y') AS Data_Cadastro
	FROM
		aviso
	WHERE
		Codg_Aviso = ".$_GET['codg_aviso'];
$result = mysql_query($comando);
$registro = mysql_fetch_array($result);
?>
<html>
<head>
<title>IPECON - Ensino e Consultoria</title>
<script language="javascript" type="text/javascript" src="js/areaAluno.js"></script>
<link rel="stylesheet" href="css/login.css" type="text/css" />
</head>
<body>
<div id="aviso">
     <h2><?=strtoupper($registro['Titulo']); ?></h2>
     <p><?=nl2br($registro['Descricao']); ?></p>
     <div id="rodape">
          <p><?=$registro['Data_Cadastro']; ?></p>
     </div>
     <div id="botao">
          <input type="buttoN" id="fechar" value="FECHAR" class="btnSair" onClick="JavScript: fecharJanela()" />
     </div>
</div>
</body>
</html>
