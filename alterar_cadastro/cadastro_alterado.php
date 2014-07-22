<?php
//=============================================//
// Propriet�rio : IPECON - Ensino e Consultoria
// Site : www.ipecon.com.br
// Autor : R�gis Rodrigues de Andrade
// P�gina : Alterar Aluno
//=============================================//
session_start();
require('../../conexao.inc.php'); //== Faz a conex�o com o banco

//== Descri��o do STATUS
//== 0 --> Inativo
//== 1 --> Ativo

//== Formata��o da Data
$data = explode('/',$_POST['data_nascimento']);
$_POST['data_nascimento'] = $data[2].'-'.$data[1].'-'.$data[0];

//== Retirar sinais do CPF
$id_numero = str_replace( "." , "" , str_replace("-" , "" , $cpf ));

//== Alterar a tabela de aluno
$cmd_aluno = "
	UPDATE aluno SET
		Nome = '".$_POST['nome']."',
		Data_Nascimento = '".$_POST['data_nascimento']."',
		Naturalidade = '".$_POST['naturalidade']."',
		UF_Naturalidade = '".$_POST['uf_1']."',
		Nacionalidade = '".$_POST['nacionalidade']."',
		Sexo = '".$_POST['sexo']."',
		RG = '".$_POST['rg']."',
		Orgao = '".$_POST['orgao']."',
		e_Mail = '".$_POST['email']."',
		Usuario_Alteracao = '".$_SESSION['login']."',
		Data_Alteracao = '".date('Y-m-d')."'
	WHERE
		Id_Numero = '".$_SESSION['id_numero']."'";
mysql_query($cmd_aluno) or die ("Erro na Alteração do Aluno. <br>".mysql_error());
//== Fim - Alterar a tabela de aluno

//== Alterar a tabela de endereco
$cmd_endereco = "
	UPDATE endereco SET
		Endereco = '".$_POST['endereco']."',
		Bairro = '".$_POST['bairro']."',
		CEP = '".$_POST['cep']."',
		Cidade = '".$_POST['cidade']."',
		UF = '".$_POST['uf_2']."',
		Fone_Residencial = '".$_POST['fone_residencial']."',
		Fone_Comercial = '".$_POST['fone_comercial']."',
		Celular = '".$_POST['celular']."',
		Usuario_Alteracao = '".$_SESSION['login']."',
		Data_Alteracao = '".date('Y-m-d')."'
	WHERE
		Id_Numero = '".$_SESSION['id_numero']."'";
mysql_query($cmd_endereco) or die ("Erro na Alteração do Endereço do Aluno. <br>".mysql_error());
//== Fim - Alterar a tabela de endereco

//== Alterar a tabela de gradua��o
$cmd_graduacao = "
	UPDATE graduacao SET
		Curso_Graduacao = '".$_POST['graduacao']."',
		Instituicao = '".$_POST['instituicao']."',
		Sigla = '".$_POST['sigla']."',
		Ano_Conclusao = '".$_POST['conclusao']."',
		Usuario_Alteracao = '".$_SESSION['login']."',
		Data_Alteracao = '".date('Y-m-d')."'
	WHERE
		Id_Numero = '".$_SESSION['id_numero']."'";
mysql_query($cmd_graduacao) or die ("Erro na Alteração da Graduação do Aluno.<br>".mysql_error());
//== Fim - Alterar a tabela de gradua��o
?>
<script>
	alert('Seus dados foram alterados com sucesso!');
	history.back();
</script>