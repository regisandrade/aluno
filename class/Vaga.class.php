<?php
/**
* 
* Class Vaga
* Class para manter vagas
* 
*/
class Vaga {
	
	// function __construct()
	// {
		
	// }

	/**
	* Pesquisar vagas ou apenas uma
	*/
	function pesquisar($pdo,$param=null){
		try {
			$sql = "SELECT
					       ID
					      ,ID_EMPRESA
					      ,TITULO
					      ,DESCRICAO
					      ,CARGO
					      ,CARGA_HORARIA
					      ,ATIVIDADES
					      ,PERFIL_DESEJADO
					      ,SALARIO
					      ,BENEFICIOS
					      ,DATA_CADASTRO
					      ,DATA_INICIO_VIGENCIA
					      ,DATA_FINAL_VIGENCIA
					      ,STATUS
					FROM
					       vagas
					WHERE
					       1=1";
			if($param['id']){
				$sql .= "\n AND ID = ".$param['id'];
			}
			
			if($param['idEmpresa']){
				$sql .= "\n AND ID_EMPRESA = ".$param['idEmpresa'];
			}

			if($param['order']){
				$sql .= "\n ORDER BY ".$param['order'];
			}

			$rs = $pdo->prepare($sql);
			$count = $rs->execute();

			if($count === false){
				$resposta['mensagem'] = "Nenhum registro encontrado.";
				$resposta['sucesso'] = false;
			}else{
				$conta = 0;
				$arrDados = array();
				while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
					$arrDados[$conta]['idVaga'] = $registro->ID;
					$arrDados[$conta]['idEmpresa'] = $registro->ID_EMPRESA;
					$arrDados[$conta]['titulo'] = $registro->TITULO;
					$arrDados[$conta]['descricao'] = $registro->DESCRICAO;
					$arrDados[$conta]['cargo'] = $registro->CARGO;
					$arrDados[$conta]['cargaHoraria'] = $registro->CARGA_HORARIA;
					$arrDados[$conta]['atividades'] = $registro->ATIVIDADES;
					$arrDados[$conta]['perfilDesejado'] = $registro->PERFIL_DESEJADO;
					$arrDados[$conta]['salario'] = $registro->SALARIO;
					$arrDados[$conta]['beneficios'] = $registro->BENEFICIOS;
					$arrDados[$conta]['dataCadastro'] = $registro->DATA_CADASTRO;
					$arrDados[$conta]['dataInicioVigencia'] = $registro->DATA_INICIO_VIGENCIA;
					$arrDados[$conta]['dataFinalVigencia'] = $registro->DATA_FINAL_VIGENCIA;
					$arrDados[$conta]['status'] = $registro->STATUS;

					$conta++;
			}

			$resposta['valores'] = $arrDados;
			$resposta['sucesso'] = true;

		} catch (Exception $e) {
			$resposta['mensagem'] = $e;
			$resposta['sucesso'] = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

	/**
	* Inserir vaga
	*/
	function inserir($pdo,$param=null){

	}

	/**
	* Alterar vaga
	*/
	function alterar($pdo,$param=null){

	}

	/**
	* excluir vaga
	*/
	function excluir($pdo,$param=null){
		try {
            $sql = "delete from vagas where ID = ?";
            $rs = $pdo->prepare($sql);
            $count = $rs->execute(array($param['idVaga']));

            if($count === false){
              $resposta['mensagem'] = "Erro ao excluir a vaga.";
              $resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
              $resposta['sucesso']  = false;
            }else{
              $resposta['mensagem'] = "Vaga excluída com sucesso.";
              $resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
              $resposta['sucesso']  = true;
            }
        } catch (Exception $e) {
            $resposta['mensagem'] = $e->getMessage();
            $resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
            $resposta['sucesso']  = false;
        }
	}


} // Fim class
