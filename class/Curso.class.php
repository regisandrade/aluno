<?php
class Curso{
	public function pesquisar($pdo,$parametros=null){
		try {
			$sql = "SELECT
                           *
                    FROM
                           curso
                    WHERE
                           Codg_Curso = ?";
			
			$rs = $pdo->prepare($sql);
          	$count = $rs->execute(array($parametros['curso']));
          	
          	//var_dump($count, $rs->errorInfo());

          	if($count === false){
          		$resposta['mensagem'] = "Nenhum registro encontrado.";
          		$resposta['sucesso'] = false;
          	}else{
          		$conta = 0;
          		$arrDados = array();
          		while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
          			$arrDados[$conta]['codgCurso'] = $registro->Codg_Curso;
          			$arrDados[$conta]['nome'] = $registro->Nome;

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