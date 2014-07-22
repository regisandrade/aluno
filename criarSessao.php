<?php
  session_start();
  // SETAR AS VARIAVEIS DE TURMA
  $_reg = explode('|',$_REQUEST['turma']);
  $_SESSION['turma']       = $_reg[0];
  $_SESSION['ano']         = $_reg[1];
  $_SESSION['nomeTurma']   = $_reg[2];
  $_SESSION['codgCurso']   = $_reg[3];
  $_SESSION['statusCurso'] = $_reg[4]; // 0->Inativo; 1->Ativo
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<title>IPECON - Consultoria e Treinamento</title>
<META HTTP-EQUIV="Refresh" content="0; URL=home.php">
</head>

<body>
<p>&nbsp;</p>
</body>
</html>
