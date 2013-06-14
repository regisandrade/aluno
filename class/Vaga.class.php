<?php
/**
* 
* Class Vaga
* Class para manter vagas
* 
*/
class Vaga {
	private $util;
	
	function __construct() {
		$this->util = new Util();
	}

	/**
	* Pesquisar vagas ou apenas uma
	*/
	function pesquisar($pdo,$param=null) {
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
				$sql .= "\n AND ID = {$param['id']}";
			}
			
			if($param['idEmpresa']){
				$sql .= "\n AND ID_EMPRESA = {$param['idEmpresa']}";
			}

			if($param['dataHoje']){
				$sql .= "\n AND '{$param['dataHoje']}' between VAG.DATA_INICIO_VIGENCIA 
														   and VAG.DATA_FINAL_VIGENCIA";
			}

			if($param['order']){
				$sql .= "\n ORDER BY {$param['order']}";
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
		try {
			$sql = "insert into
                    vagas(
                            ID_EMPRESA
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
                    ) values (
                           :idEmpresa
                          ,:titulo
                          ,:descricao
                          ,:cargo
                          ,:cargaHoraria
                          ,:atividades
                          ,:perfilDesejado
                          ,:salario
                          ,:beneficios
                          ,:dataCadastro
                          ,:dataInicioVigencia
                          ,:dataFinalVigencia
                          ,:status)";
			$rs  = $pdo->prepare($sql);
			
			$dtInicio = Util::formataData($_REQUEST['dtInicioVigencia'],'/','-','USA');
            $dtFinal = Util::formataData($_REQUEST['dtFinalVigencia'],'/','-','USA');
            /* @var $salario float */
            $salario = str_replace(',','.',str_replace('.','',$_REQUEST['salario']));

			$count = $rs->execute(array(':idEmpresa'=>$param['idEmpresa'],
										':titulo'=>$param['titulo'],
										':descricao'=>$param['descricao'],
										':cargo'=>$param['cargo'],
										':cargaHoraria'=>$param['cargaHoraria'],
										':atividades'=>$param['atividade'],
										':perfilDesejado'=>$param['perfilDesejado'],
										':salario'=>$salario,
										':beneficios'=>$param['beneficio'],
										':dataCadastro'=>date('Y-m-d'),
										':dataInicioVigencia'=>$dtInicio,
										':dataFinalVigencia'=>$dtFinal.' 23:59:59',
										':status'=>'I'));

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

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

	/**
	* Alterar vaga
	*/
	function alterar($pdo,$param=null){
		try {
			$sql = "update
					       vagas
					set
					       ID_EMPRESA           = ?
					      ,TITULO               = ?
					      ,DESCRICAO            = ?
					      ,CARGO                = ?
					      ,CARGA_HORARIA        = ?
					      ,ATIVIDADES           = ?
					      ,PERFIL_DESEJADO      = ?
					      ,SALARIO              = ?
					      ,BENEFICIOS           = ?
					      ,DATA_INICIO_VIGENCIA = ?
					      ,DATA_FINAL_VIGENCIA  = ?
					where
					       ID = ?";

			$dtInicio = Util::formataData($param['dtInicioVigencia'],'/','-','USA');
            $dtFinal = Util::formataData($param['dtFinalVigencia'],'/','-','USA');
            /* @var $salario float */
            $salario = str_replace(',','.',str_replace('.','',$param['salario']));

            $count = $rs->execute(array($param['idEmpresa']
                                       ,$param['titulo']
                                       ,$param['descricao']
                                       ,$param['cargo']
                                       ,$param['cargaHoraria']
                                       ,$param['atividade']
                                       ,$param['perfilDesejado']
                                       ,$salario
                                       ,$param['beneficio']
                                       ,$dtInicio
                                       ,$dtFinal
                                       ,$param['idVaga']));

			if($count === false){
				$resposta['mensagem'] = "Erro ao alterar a vaga.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "Vaga alterada com sucesso.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = true;
			}
		} catch (Exception $e) {
			$resposta['mensagem'] = $e->getMessage();
			$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
			$resposta['sucesso']  = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

	/**
	* excluir vaga
	*/
	function excluir($pdo,$param=null){
		try {
			$sql = "delete from vagas where ID = ?";
			$rs  = $pdo->prepare($sql);
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

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

	/**
	* Alterar status da vaga
	*/
	function alterarStatus($pdo,$param=null){
		try {
			$sql = "update vagas set STATUS = ? where ID = ?";
			$rs = $pdo->prepare($sql);
			$count = $rs->execute(array($param['status']
									   ,$param['idVaga']));

			if($count === false){
				$resposta['mensagem'] = "Erro ao alterar o status da vaga.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "Vaga ".($param['status'] == 'A' ? 'ativada' : 'desativada')." com sucesso!";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = true;
				// Apos realizar a alteração do STATUS da vaga, implantar o envio de e-mail para o cliente
				// comunicando que a vaga foi ativada.
			}
			
		} catch (Exception $e) {
			$resposta['mensagem'] = $e->getMessage();
			$resposta['sucesso']  = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

} // Fim class
