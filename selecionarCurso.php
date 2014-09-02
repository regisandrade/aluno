<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
    <meta http-equiv="Content-Language" content="pt-BR" />
    <meta http-equiv="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
    <meta name="target_country" content="br" />
    <meta name="country" content="Brazil" />
    <meta name="copyright" content="Ipecon Ensino e Consultoria - ipecon@ipecon.com.br - regisandrade@gmail.com" />
    <meta name="description" content="Ipecon: Ensino e Consultoria." />
    <meta name="keywords" content="Goiás, Goiânia, Brasil, cursos, pos-graduação, controladoria, finanças, pessoa, marketing, matemática, pericia judicial, pericia, judicial, gestão governamental" />

    <title>Área do aluno: <?php echo iconv('UTF-8','ISO-8859-1',$_SESSION['nome']);?> :-: IPECON - Consultoria e Treinamento</title>

    <link href="../css/ipecon.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
    function mudar(){
	    document.frmTurma.submit();
    }
    </script>

</head>
<?php
require_once('../conexao.inc.php'); //== Conexï¿½o com o Banco de Dados

// Verificar se o Aluno esta matriculado em mais de um CURSO
$_sql = "
SELECT 
	M.Aluno,
	M.Turma AS CodgTurma,
	M.Ano,
	T.Nome AS NomeTurma,
	T.Curso AS CodgCurso
FROM
	matricula M
JOIN turma T ON 
	T.Turma = M.Turma
WHERE
	M.Aluno = '".$_SESSION['id_numero']."'
GROUP BY
	M.Turma, M.Ano
ORDER BY
	T.Nome";
$_rs = mysql_query($_sql) or die('Erro na consulta da matricula.'.mysql_error());

?>
<body>
<div id="geral">
    <div id="menu">
	<ul>
	    <li>Área do aluno: <span style="color: #FF0000"><b><?php echo $_SESSION['nome'];?></b></span></li>
	</ul>
    </div>
    <div id="corpoAluno" style="text-align: center;">
	<p></p>
	<form name="frmTurma" action="criarSessao.php" method="get">
	    <label><span>Selecionar o curso:</span>
		<select name="turma" id="turma" onchange="JavaScript:mudar()" class="txtMedio">
		    <option value="">[--]</option>
		    <?php
		    while($_dados = mysql_fetch_array($_rs)){
		    ?>
			   <option value="<?php echo $_dados['CodgTurma'].'|'.$_dados['Ano'].'|'.$_dados['NomeTurma'].'|'.$_dados['CodgCurso'].'|'.$_dados['StatusCurso']?>" <?php echo $habilitarCurso; ?>><?php echo strtoupper($_dados['NomeTurma']); ?></option>
		    <?php
		    }
		    ?>
		</select>
	    </label>
	</form>
    </div>
    <div id="rodape">
	<p>Av. T-4, nº 1.478, Ed. Absolut Business Style, sala A-132 (13º andar)<br/>Setor Bueno, Goiânia/GO - CEP: 74.230-030<br/>
	Telefones: (62) 3214-2563, 3214-3229<br/>
	e-mail: <a href="mailto:ipecon@ipecon.com.br">ipecon@ipecon.com.br</a></p>
    </div>
</div>
</body>
</html>
