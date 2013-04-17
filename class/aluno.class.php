<?php
class Aluno{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT
                     ID
                    ,ALU.Id_Numero
                    ,ALU.Nome
                    ,DATE_FORMAT(ALU.Data_Nascimento, '%d/%m/%y') AS Data_Nascimento
                    ,ALU.Naturalidade
                    ,ALU.UF_Naturalidade
                    ,ALU.Nacionalidade
                    ,ALU.Sexo
                    ,ALU.RG
                    ,ALU.Orgao
                    ,ALU.CPF
                    ,ALU.e_Mail
                    ,ENDE.Endereco
                    ,ENDE.Bairro
                    ,ENDE.CEP
                    ,ENDE.Cidade
                    ,ENDE.UF
                    ,ENDE.Fone_Residencial
                    ,ENDE.Fone_Comercial
                    ,ENDE.Celular AS Fone_Celular
                    ,GRA.Curso_Graduacao
                    ,GRA.Instituicao
                    ,GRA.Sigla
                    ,GRA.Ano_Conclusao
              FROM
                     aluno ALU
              LEFT JOIN endereco ENDE ON
                     ENDE.Id_Numero = ALU.Id_Numero
              LEFT JOIN graduacao GRA ON
                     GRA.Id_Numero = ALU.Id_Numero
              WHERE
                     ALU.Id_Numero = ?";
			
			$rs = $pdo->prepare($sql);
    	$count = $rs->execute(array($parametros['idNumero']));
    	
    	//var_dump($count, $rs->errorInfo());

    	if($count === false){
    		$resposta['mensagem'] = "Nenhum registro encontrado.";
    		$resposta['sucesso'] = false;
    	}else{
    		$conta = 0;
    		$arrDados = array();
    		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
    			$arrDados[$conta]['id'] = $registro->ID;
    			$arrDados[$conta]['nome'] = $registro->Nome;
    			$arrDados[$conta]['dataNascimento'] = $registro->Data_Nascimento;
    			$arrDados[$conta]['naturalidade'] = $registro->Naturalidade;
    			$arrDados[$conta]['ufNaturalidade'] = $registro->UF_Naturalidade;
    			$arrDados[$conta]['Nacionalidade'] = $registro->Nacionalidade;
    			$arrDados[$conta]['Sexo'] = $registro->Sexo;
    			$arrDados[$conta]['rg'] = $registro->RG;
    			$arrDados[$conta]['orgao'] = $registro->Orgao;
    			$arrDados[$conta]['cpf'] = $registro->CPF;
    			$arrDados[$conta]['eMail'] = $registro->e_Mail;
    			$arrDados[$conta]['endereco'] = $registro->Endereco;
    			$arrDados[$conta]['bairro'] = $registro->Bairro;
    			$arrDados[$conta]['cep'] = $registro->CEP;
    			$arrDados[$conta]['cidade'] = $registro->Cidade;
    			$arrDados[$conta]['foneResidencial'] = $registro->Fone_Residencial;
    			$arrDados[$conta]['foneComercial'] = $registro->Fone_Comercial;
    			$arrDados[$conta]['foneCelular'] = $registro->Fone_Celular;
    			$arrDados[$conta]['cursoGraduacao'] = $registro->Curso_Graduacao;
    			$arrDados[$conta]['instituicao'] = $registro->Instituicao;
    			$arrDados[$conta]['sigla'] = $registro->Sigla;
    			$arrDados[$conta]['anoConclusao'] = $registro->Ano_Conclusao;

    			$conta++;
    		}

    		$resposta['valores'] = $arrDados;
    		$resposta['sucesso'] = true;
    	}

		} catch (Exception $e) {
			$resposta['mensagem'] = $e;
    	$resposta['sucesso'] = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

}
?>